?>
<section class="search-banner-wrapper">
    <video class="bg-video" autoplay loop muted playsinline>
        <source src="http://localhost/urbanfeatconstruction/wp-content/uploads/2025/10/160033-820167238.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <div class="container h-100 d-flex flex-column justify-content-center align-items-center text-center position-relative">
        <div class="glass-blur container-fluid">
            <h1 class="mb-4 text-white">Find Your Dream Property</h1>
            <form id="propertyForm" class="row g-3 align-self" action="search 1.html" method="GET">
                <div class="col-md-4">
                    <select name="location" class="form-select" id="locationSelect" required>
                        <option value="">Select Location</option>
                        <option value="delhi">Delhi</option>
                        <option value="mumbai">Mumbai</option>
                        <option value="lucknow">Lucknow</option>
                    </select>
                </div>
                <div class="col-md-5">
                    <input type="text" name="keywords" class="form-control" id="keywordInput" placeholder="Enter keywords"/>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary cus-btn">Search</button>
                </div>
            </form>
        </div>
    </div>
</section>

<section class="main-page-sec">
    <h2>Grouped by Locat</h2>
    <div class="carousel-wrapper" id="locationCarouselWrapper">
        <button class="carousel-btn carousel-prev" id="locationPrevBtn"><i class="bi-caret-left-fill"></i></button>
        <div class="carousel-container" id="locationCarousel"></div>
        <button class="carousel-btn carousel-next" id="locationNextBtn"><i class="bi-caret-right-fill"></i></button>
    </div>

    <h2>Grouped by Type</h2>
    <div class="carousel-wrapper" id="typeCarouselWrapper">
        <button class="carousel-btn carousel-prev" id="typePrevBtn"><i class="bi-caret-left-fill"></i></button>
        <div class="carousel-container" id="typeCarousel"></div>
        <button class="carousel-btn carousel-next" id="typeNextBtn"><i class="bi-caret-right-fill"></i></button>
    </div>

    <h2>Grouped by Status</h2>
    <div class="carousel-wrapper" id="statusCarouselWrapper">
        <button class="carousel-btn carousel-prev" id="statusPrevBtn"><i class="bi-caret-left-fill"></i></button>
        <div class="carousel-container" id="statusCarousel"></div>
        <button class="carousel-btn carousel-next" id="statusNextBtn"><i class="bi-caret-right-fill"></i></button>
    </div>
</section>
php?>




