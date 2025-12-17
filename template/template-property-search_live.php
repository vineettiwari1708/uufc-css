<?php
/**
 * Template Name: Property Search Page
 */
get_header();
?>

<section class="search-banner-wrapper">
    <div class="header-spacer"></div>

    <video class="bg-video" autoplay loop muted playsinline>
        <source src="https://upgrade.urbanfeatconstruction.com/wp-content/uploads/2025/12/uf_video.mp4" type="video/mp4">
    </video>

    <div class="container h-100 d-flex flex-column justify-content-center align-items-center text-center position-relative">
        <div class="glass-blur container-fluid">
            <h1 class="mb-4 text-white">Find Your Dream Property</h1>

            <?php
            // Fetch Property Locations (Taxonomy)
            $locations = get_terms(array(
                'taxonomy'   => 'property_location',
                'hide_empty' => false,
            ));
            ?>

            <!-- SEARCH FORM -->
            <form method="get"
                  action="<?php echo esc_url( site_url('/search-properties') ); ?>"
                  class="row g-3 align-self"
                  id="searchForm">

                <!-- LOCATION -->
                <div class="col-md-5">
                    <select name="location" class="form-select" required>
                        <option value="">Select Location</option>
                        <?php if ( ! empty($locations) && ! is_wp_error($locations) ) : ?>
                            <?php foreach ( $locations as $location ) : ?>
                                <option value="<?php echo esc_attr($location->slug); ?>"
                                    <?php selected($_GET['location'] ?? '', $location->slug); ?>>
                                    <?php echo esc_html($location->name); ?>
                                </option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>

                <!-- KEYWORDS -->
                <div class="col-md-5">
                    <input type="text"
                           name="keywords"
                           class="form-control"
                           placeholder="Enter keywords (e.g., villa, 3BHK)"
                           value="<?php echo esc_attr($_GET['keywords'] ?? ''); ?>">
                </div>

                <!-- BUTTON -->
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary cus-btn w-100">
                        Search
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

<?php
// CHECK IF SEARCH APPLIED
$search_applied = ! empty($_GET['location']) || ! empty($_GET['keywords']);

if ( $search_applied ) {

    /* ===============================
     * SEARCH QUERY
     * =============================== */

    $args = array(
        'post_type'      => 'property',
        'posts_per_page' => -1,
    );

    // Keyword Search
    if ( ! empty($_GET['keywords']) ) {
        $args['s'] = sanitize_text_field($_GET['keywords']);
    }

    // Location Taxonomy Filter
    if ( ! empty($_GET['location']) ) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'property_location',
                'field'    => 'slug',
                'terms'    => sanitize_text_field($_GET['location']),
            )
        );
    }

    $query = new WP_Query($args);
    ?>

    <section class="property-results container my-5">
        <h2 class="mb-4">Search Results</h2>

        <?php if ( $query->have_posts() ) : ?>
            <div class="row">
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <div class="col-md-4 mb-4">
                        <div class="property-card">
                            <a href="<?php the_permalink(); ?>">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <?php the_post_thumbnail('medium', ['class' => 'img-fluid']); ?>
                                <?php endif; ?>
                                <h3 class="mt-3"><?php the_title(); ?></h3>
                            </a>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else : ?>
            <p>No properties found matching your criteria.</p>
        <?php endif; ?>

        <?php wp_reset_postdata(); ?>
    </section>

<?php
} else {

    /* ===============================
     * DEFAULT SECTIONS (NO SEARCH)
     * =============================== */

    render_property_search_section('location');
    render_property_search_section('status');
    render_property_search_section('type');
}

get_footer();
