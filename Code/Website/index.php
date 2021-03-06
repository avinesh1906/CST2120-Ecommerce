<?php
    // php variables
    $pageName = 'Home';
    $folderName = 'home';

    // include the common.php which contains the php functions
    include('./common/common.php');

    // call the php functions 
    generateHeader($pageName, $folderName);
    generateNavBar($pageName);
    generateLoggedMsg($pageName);
?>
<!-- carousel slides -->
<div id="carouselControls" class="carousel slide" data-ride="carousel">
    <!-- Carousel layout -->
    <div class="carousel-inner">
        <!-- Active Slide -->
        <div class="carousel-item active">
            <!-- 1st slide content -->
            <div class="carousel-content">
                <!-- Carousel Image -->
                <div class="carousel-image">
                    <img src="./common/img/watercolor_landscape_mauritius.jpg" alt="landscape mauritius" width= "100%" 
                    height="500px">
                </div>
                <!-- Carousel Caption -->
                <div class="carousel-side-caption">
                    <h5>Mauritius Landscape</h5>
                    <p>Mauritius was made first, and then heaven; and heaven
                        was copied after Mauritius. 
                    </p>
                    <p id="author">
                    Mark Twain
                    </p>
                </div>
            </div>
        </div>
        <!-- Second slide -->
        <div class="carousel-item">
            <div class="carousel-content">
                <!-- Image -->
                <div class="carousel-image">
                    <img src="./common/img/watercolor_LeMorne.jfif" alt="le morne" width= "100%" 
                        height="500px">
                </div>
                <!-- Content -->
                <div class="carousel-side-caption">
                    <h5>Le Morne</h5>
                    <p>Le Morne Mountain represents marronage and its impact in Mauritius. 
                        It is a symbol of the slaves’ fight for freedom, their suffering, 
                        and their sacrifice. 
                    </p>
                    <p id="author">
                        UNESCO
                    </p>
                </div>
            </div>
        </div>
        <!-- Third slide -->
        <div class="carousel-item">
            <div class="carousel-content">
                <!-- Image -->
                <div class="carousel-image">
                    <img src="./common/img/sega.jpg" alt="sega"width= "100%" 
                    height="500px">
                </div>
                <!-- Caption -->
                <div class="carousel-side-caption">
                    <h5>Le Sega Mauricien</h5>
                    <p>The Sega is a cry from the soul trying to transcend the miseries and heartaches of life,
                         while at the same time expressing the universal human desire for joy and happiness.
                    </p>
                    <p id="author">
                        Dinesh Sobhee
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Control Buttons -->
    <a class="carousel-control-prev" href="#carouselControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<!-- Top Product -->
<div class="top-product">
    <!-- Top Product Title -->
    <div class="title">
        <h4> Top Product </h4>
    </div>
    <!-- List of options -->
    <div class="options">
        <div class="options-item" id="top-product-item">
            <!-- Option list -->
            <ul class="optionbar-item">
                <!-- 1st row -->
                <li class="option-item">
                    <a class="option-link featuredBtn" id="active"  name="featured">
                        FEATURED
                    </a>
                </li>
                <!-- 2nd row -->
                <li class="option-item">
                    <a class="option-link latestBtn" name="latest">
                    LATEST
                    </a>
                </li>
                <!-- 3rd row -->
                <li class="option-item">
                    <a class="option-link bestsellerBtn" name="bestseller"> 
                    BESTSELLER
                    </a>
                </li>
            </ul>

        </div>
    </div>

    <!-- Featured choice -->
    <div class="featured">
    </div>
    <!-- latest choice -->
    <div class="latest">
    </div>
    <!-- bestseller choice -->
    <div class="bestseller">
    </div>
    
</div>

<!-- Category -->
<div class="home-catogory">
    <!-- Description -->
    <div class="description">
        <!-- Title -->
        <h2>
            Our Categories
        </h2>
        <!-- body content -->
        <div class="description-body">
        Discover Mauritius Through Original Paintings
        </div>
    </div>
    <!-- Card -->
    <div class="painting">
        <!-- 1st column card -->
        <div class="first-column">
            <!-- card link -->
            <a href="./portrait/portrait.php">
                <div class="card">
                    <!-- image -->
                    <img class="card-img" src="./common/img/pencil_African.jpg" alt="Pencil African">
                    <!-- content body -->
                    <div class="card-body">
                        <h5 class="card-title">Portrait Painting</h5>
                    </div>
                </div>
            </a>
        </div>
        <!-- second column card -->
        <div class="second-column">
            <!-- 1st card link -->
            <a href="./landscape/landscape.php">
                <div class="card">
                    <!-- image -->
                    <img class="card-img" src="./common/img/mauritius_greeting.jpg" alt="Mauritius Greeting">
                    <!-- body content -->
                    <div class="card-body">
                        <h5 class="card-title">Landscape Painting</h5>
                    </div>
                </div>
            </a>
            <!-- 2nd card link -->
            <a href="./oil/oil.php">
                <div class="card" style="padding-top: 5%">
                    <!-- image -->
                    <img class="card-img" src="./common/img/eyeoil.jpg" alt="Mauritius Greeting">
                    <!-- body content -->
                    <div class="card-body">
                        <h5 class="card-title">Oil Painting</h5>
                    </div>
                </div>
            </a>
        </div>
        <!-- 3rd column card -->
        <div class="third-column">
            <!-- 1st card link -->
            <a href="./abstract/abstract.php">
                <div class="card">
                    <!-- image -->
                    <img class="card-img" src="./common/img/dancing_Abstract.jpg" alt="Mauritius Greeting">
                    <!-- body content -->
                    <div class="card-body">
                        <h5 class="card-title">Abstract Painting</h5>
                    </div>
                </div>
            </a>
            <!-- 2nd card link -->
            <a href="./historical/historical.php">
                <div class="card" style="margin-top: 8%">
                    <!-- image -->
                    <img class="card-img" src="./common/img/mauritiusHistorical.jpg" alt="Mauritius Greeting">
                    <!-- Body content -->
                    <div class="card-body" >
                        <h5 class="card-title">Historical Painting</h5>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
<!-- Recommendation -->
<div class="recommendation">
    <div class="title">
        <h2> Recommendation </h2>
    </div>
    <!-- image class -->
    <div class="img">
        <div class="card-deck row" id="homeRecommendation">
        </div>
    </div>
</div>

<?php
    // php function to generate the footer
    generateJavaScript($pageName);
    generateFooter($pageName);
?>