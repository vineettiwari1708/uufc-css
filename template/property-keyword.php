<?php
/* 
Template Name: Property Keyword Search
*/

get_header();
?>

<div class="container-fluid">
  <div class="row d-flex g-4">
    
    <!-- Search Banner -->
    <section class="search-banner-wrapper">
      <div class="header-spacer"></div>
      <video class="bg-video" autoplay loop muted playsinline>
        <source src="http://localhost/urbanfeatconstruction/wp-content/uploads/2025/10/160033-820167238_tiny.mp4" type="video/mp4">
        Your browser does not support the video tag.
      </video>
      <div class="container h-100 d-flex flex-column justify-content-center align-items-center text-center position-relative">
        <div class="glass-blur container-fluid">
          <h1 class="mb-4 text-white">Find Your Dream Property</h1>
        </div>
      </div>
    </section>

    <!-- Search Form Sidebar -->
    <div class="col-md-3 h-100 mb-4">
      <div class="p-4 bg-warning rounded shadow-sm">
        <h4 class="mb-4 text-dark">Search Properties</h4>
        <form method="GET" action="" class="needs-validation">
          <!-- Location -->
          <div class="mb-3">
            <label class="form-label fw-semibold fw-bold">Location</label>
            <input type="text" name="location" class="form-control form-control-sm rounded-pill" placeholder="e.g. Mumbai, Delhi" value="<?php echo isset($_GET['location']) ? esc_attr($_GET['location']) : ''; ?>" />
          </div>
          <!-- Keyword -->
          <div class="mb-3">
            <label class="form-label fw-semibold fw-bold">Keyword</label>
            <input type="text" name="keywords" class="form-control form-control-sm rounded-pill" placeholder="e.g. garden, sea view" value="<?php echo isset($_GET['keywords']) ? esc_attr($_GET['keywords']) : ''; ?>" />
          </div>
          <button type="submit" class="btn btn-primary w-100 mt-3 cus-btn">Search</button>
        </form>
      </div>
    </div>

    <!-- Search Results -->
    <div class="col-md-9 h-100 mb-5">
      <div class="p-4 bg-custom rounded shadow-sm bg-search-info">
        <h3 class="mb-4 text-dark">
          <?php
            echo "Search Results";
            if (!empty($_GET['location'])) echo " in " . ucfirst($_GET['location']);
            if (!empty($_GET['keywords'])) echo " for '" . esc_html($_GET['keywords']) . "'";
          ?>
        </h3>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3">
          <?php
            // Sanitize inputs
            $location = sanitize_text_field($_GET['location'] ?? '');
            $keywords = sanitize_text_field($_GET['keywords'] ?? '');

            // Prepare the meta_query (if needed)
            $meta_query = [];

            // Prepare tax_query for Location and Amenities search
            $tax_query = [];

            if ($keywords) {
                // Search for matching taxonomy terms (property_location, property_amenities)
                $tax_query[] = [
                    'taxonomy' => 'property_location',  // Search in Location taxonomy
                    'field'    => 'name',               // Search by term name
                    'terms'    => $keywords,            // Use the search keyword
                    'operator' => 'LIKE',               // Partial match
                ];

                $tax_query[] = [
                    'taxonomy' => 'property_amenities', // Search in Amenities taxonomy
                    'field'    => 'name',               // Search by term name
                    'terms'    => $keywords,            // Use the search keyword
                    'operator' => 'LIKE',               // Partial match
                ];
            }

            if ($location) {
                // If a location is entered, filter the results by location
                $tax_query[] = [
                    'taxonomy' => 'property_location',
                    'field'    => 'name',
                    'terms'    => $location,
                ];
            }

            // Pagination Variables
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

            // WP_Query Arguments
            $args = [
                'post_type'      => 'property',
                'posts_per_page' => 12,   // Set number of posts per page
                'paged'          => $paged, // Handle pagination
                'tax_query'      => $tax_query,
                'orderby'        => 'date',
                'order'          => 'DESC',
            ];

            $query = new WP_Query($args);

            if ($query->have_posts()):
                while ($query->have_posts()): $query->the_post();
                    // Fetch property details
                    $property_id = get_the_ID();
                    $property_title = get_the_title();
                    $property_bhk = get_post_meta($property_id, 'bhk', true);
                    $property_price = get_post_meta($property_id, 'price', true);
                    $property_status = get_post_meta($property_id, 'status', true);
                    $property_discount = get_post_meta($property_id, 'discount', true);

                    // Sale flag
                    $sale_flag = '';
                    if ($property_status === 'Sold') {
                        $sale_flag = 'SOLD';
                    } elseif ($property_discount) {
                        $sale_flag = $property_discount . '% OFF';
                    }

                    // Fetch location terms
                    $property_location_terms = get_the_terms($property_id, 'property_location');
                    if ($property_location_terms && !is_wp_error($property_location_terms)) {
                        $locations = wp_list_pluck($property_location_terms, 'name');
                        $property_location = implode(', ', $locations);
                    } else {
                        $property_location = 'Unknown Location';
                    }

                    // Fetch amenities terms (up to 3 for display)
                    $property_amenities_terms = wp_get_post_terms($property_id, 'property_amenities');
                    $property_amenities_terms = array_slice($property_amenities_terms, 0, 3); // Limit to first 3 amenities
                    $property_amenities = wp_list_pluck($property_amenities_terms, 'name');

                    // Fetch property image
                    $property_image = get_the_post_thumbnail_url($property_id, 'full');

                    // Create an array with the property details
                    $property_data = [
                        'id' => $property_id,
                        'title' => $property_title,
                        'bhk' => $property_bhk,
                        'location' => $property_location,
                        'price' => $property_price,
                        'sale_flag' => $sale_flag,
                        'image' => $property_image,
                        'amenities' => $property_amenities,
                        'status' => $property_status,
                    ];

                    // Render the property card
                    echo '<div class="col d-flex">';
                    render_property_card($property_data); // Pass the property data to the render_property_card function
                    echo '</div>';

                endwhile;

                // Pagination Links
                echo '<div class="col-12 mt-4">';
                echo paginate_links([
                    'total' => $query->max_num_pages,
                    'current' => $paged,
                    'prev_text' => '&laquo; Prev',
                    'next_text' => 'Next &raquo;',
                    'type' => 'list', // This adds a list for better styling
                ]);
                echo '</div>';

            else:
                echo "<p>No properties found.</p>";
            endif;

            wp_reset_postdata();
          ?>
        </div>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>
