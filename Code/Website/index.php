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
        <!-- Card deck layout -->
        <div class="card-deck row">
            <!-- 1st card -->
            <div class="card-scroll">
                <!-- image -->
                <img class="card-img-top" src="./common/img/marilyn.jpeg" alt="marilyn" height="450px" width="95%">
                <!-- content -->
                <div class="card-body">
                    <h5 class="card-title">Marilyn Monroe</h5>
                    <p class="card-text">If I'd observed all the rules, I'd never have got anywhere</p>
                    <div class="card-details">
                        <p>Rs 1500 </p>
                        <button style="font-size:20px"> <i class="fa fa-shopping-basket"></i> Basket </button>
                    </div>
                </div>
            </div>
            <!-- 2nd card -->
            <div class="card-scroll">
                <!-- image -->
                <img class="card-img-top" src="./common/img/women_face.jpeg" alt="women face" height="450px" width="95%">
                <!-- content -->
                <div class="card-body">
                    <h5 class="card-title">La beauté de faiblesse</h5>
                    <p class="card-text">La beauté sans grâce  est un printemps sans verdure.
                    </p>
                    <div class="card-details">
                        <p>Rs 1250 </p>
                        <button style="font-size:20px"> <i class="fa fa-shopping-basket"></i> Basket </button>
                    </div>    
                </div>
            </div>
            <!-- 3rd card -->
            <div class=" card-scroll">
                <!-- image -->
                <img class="card-img-top" src="./common/img/chinese.jpeg" alt="Chinese" height="450px" width="95%">
                <!-- content -->
                <div class="card-body">
                    <h5 class="card-title">Shameless spring</h5>
                    <p class="card-text">The first blooms of spring always make my heart sing</p>
                    <div class="card-details">
                        <p>Rs 850 </p>
                        <button style="font-size:20px"> <i class="fa fa-shopping-basket"></i> Basket </button>
                    </div>
                </div>
            </div>
            <!-- 4th card -->
            <div class="card-scroll">
                <!-- image -->
                <img class="card-img-top" src="./common/img/bonnie.jpg" alt="Bonnie" height="450px" width="95%">
                <!-- content -->
                <div class="card-body">
                    <h5 class="card-title">Bonnie Painting</h5>
                    <p class="card-text">
                        The shadows & light in her character were captured when she finally showed me her dark side
                    </p>
                    <div class="card-details">
                        <p>Rs 1250 </p>
                        <button style="font-size:20px"> <i class="fa fa-shopping-basket"></i> Basket </button>
                    </div>    
                </div>
            </div>
        </div>
    </div>

    <!-- latest choice -->
    <div class="latest">
        <div class="card-deck row">
            <!-- 1st card -->
            <div class="card-scroll">
                <!-- image -->
                <img class="card-img-top" src="./common/img/cat.jpeg" alt="cat" height="450px" width="95%">
                <!-- content -->
                <div class="card-body">
                    <h5 class="card-title">Meow</h5>
                    <p class="card-text">I wish I could write as mysterious as a cat.</p>
                    <div class="card-details">
                        <p>Rs 1500 </p>
                        <button style="font-size:20px"> <i class="fa fa-shopping-basket"></i> Basket </button>
                    </div>
                </div>
            </div>
            <!-- 2nd card -->
            <div class="card-scroll">
                <!-- image -->
                <img class="card-img-top" src="./common/img/lion.jpeg" alt="lion" height="450px" width="95%">
                <!-- content -->
                <div class="card-body">
                    <h5 class="card-title"> Le Désir d'imagination</h5>
                    <p class="card-text">L’imagination fait du désir une passion heureuse.</p>
                    <div class="card-details">
                        <p>Rs 800 </p>
                        <button style="font-size:20px"> <i class="fa fa-shopping-basket"></i> Basket </button>
                    </div>
                </div>
            </div>
            <!-- 3rd card -->
            <div class="card-scroll">
                <!-- image -->
                <img class="card-img-top" src="./common/img/women.jpeg" alt="women" height="450px" width="95%">
                <!-- content -->
                <div class="card-body">
                    <h5 class="card-title">The mysterious smile</h5>
                    <p class="card-text"> 
                        For the nature of women is closely allied to art.
                    </p>
                    <div class="card-details">
                        <p>Rs 1250 </p>
                        <button style="font-size:20px"> <i class="fa fa-shopping-basket"></i> Basket </button>
                    </div>    
                </div>
            </div>
            <!-- 4th card -->
            <div class=" card-scroll">
                <!-- image -->
                <img class="card-img-top" src="./common/img/wolves.jpeg" alt="Wolves" height="450px" width="95%">
                <!-- content -->
                <div class="card-body">
                    <h5 class="card-title">Anything Pawssible</h5>
                    <p class="card-text">
                        Be the person your dog think you are.
                    </p>
                    <div class="card-details">
                        <p>Rs 850 </p>
                        <button style="font-size:20px"> <i class="fa fa-shopping-basket"></i> Basket </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- bestseller choice -->
    <div class="bestseller">
        <div class="card-deck row">
            <!-- 1st card -->
            <div class="card-scroll">
                <!-- image -->
                <img class="card-img-top" src="./common/img/desi.jpg" alt="wolf" height="450px" width="95%">
                <!-- content -->
                <div class="card-body">
                    <h5 class="card-title">Desi </h5>
                    <p class="card-text">
                        Out of sight but on your mind.
                    </p>
                    <div class="card-details">
                        <p>Rs 800 </p>
                        <button style="font-size:20px"> <i class="fa fa-shopping-basket"></i> Basket </button>
                    </div>
                </div>
            </div>
            <!-- 2nd card -->
            <div class="card-scroll">
                <!-- image -->
                <img class="card-img-top" src="./common/img/watercolor_landscape_mauritius.jpg" alt="mauritius landscape" height="450px" width="95%">
                <!-- content -->
                <div class="card-body">
                    <h5 class="card-title">Feel zafr la</h5>
                    <p class="card-text">
                        Lavi ene zoli vwayaz.
                    </p>
                    <div class="card-details">
                        <p>Rs 1250 </p>
                        <button style="font-size:20px"> <i class="fa fa-shopping-basket"></i> Basket </button>
                    </div>    
                </div>
            </div>
            <!-- 3rd card -->
            <div class=" card-scroll">
                <!-- image -->
                <img class="card-img-top" src="./common/img/sunset.jpeg" alt="Sunset" height="450px" width="95%">
                <!-- content -->
                <div class="card-body">
                    <h5 class="card-title">Soleil p alle dormi</h5>
                    <p class="card-text">
                        Sunset are proof that endings can often be beautiful too.

                    </p>
                    <div class="card-details">
                        <p>Rs 850 </p>
                        <button style="font-size:20px"> <i class="fa fa-shopping-basket"></i> Basket </button>
                    </div>
                </div>
            </div>
            <!-- 4th card -->
            <div class=" card-scroll">
                <!-- image -->
                <img class="card-img-top" src="https://drive.google.com/uc?export=view&id=1EzoS1RBCilaq1KbTtXbcdeic-6ZwmEj4" alt="lacote" height="450px" width="95%">
                <!-- content -->
                <div class="card-body">
                    <h5 class="card-title">Zenfant la cote</h5>
                    <p class="card-text">
                        Tou mo fami peser mo fine né lor bord la cote
                    </p>
                    <div class="card-details">
                        <p>Rs 850 </p>
                        <button style="font-size:20px"> <i class="fa fa-shopping-basket"></i> Basket </button>
                    </div>
                </div>
            </div>
        </div>
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
        <button>Shop Now</button>
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
    <div class="img">
        <div class="card-deck row" id="homeRecommendation">
                <!-- 1st card -->
                <div class="card-scroll">
                    <!-- image -->
                    <img class="card-img-top" src="./common/img/desi.jpg" alt="wolf" height="350px" width="85%">
                    <!-- content -->
                    <div class="card-body">
                        <h5 class="card-title">Desi </h5>
                        <p class="card-text">
                            Out of sight but on your mind.
                        </p>
                        <div class="card-details">
                            <p>Rs 800 </p>
                            <button style="font-size:20px"> <i class="fa fa-shopping-basket"></i> Basket </button>
                        </div>
                    </div>
                </div>
                <!-- 2nd card -->
                <div class="card-scroll">
                    <!-- image -->
                    <img class="card-img-top" src="./common/img/marilyn.jpeg" alt="Marilyn" height="350px" width="95%">
                    <!-- content -->
                    <div class="card-body">
                        <h5 class="card-title">Marilyn Monroe</h5>
                        <p class="card-text">
                            If I'd observed all the rules, I'd never have got anywhere
                        </p>
                        <div class="card-details">
                            <p>Rs 1250 </p>
                            <button style="font-size:20px"> <i class="fa fa-shopping-basket"></i> Basket </button>
                        </div>    
                    </div>
                </div>
                <!-- 3rd card -->
                <div class=" card-scroll">
                    <!-- image -->
                    <img class="card-img-top" src="./common/img/sunset.jpeg" alt="Sunset" height="350px" width="95%">
                    <!-- content -->
                    <div class="card-body">
                        <h5 class="card-title">Soleil p alle dormi</h5>
                        <p class="card-text">
                            Sunset are proof that endings can often be beautiful too.

                        </p>
                        <div class="card-details">
                            <p>Rs 850 </p>
                            <button style="font-size:20px"> <i class="fa fa-shopping-basket"></i> Basket </button>
                        </div>
                    </div>
                </div>
                <!-- 4th card -->
                <div class=" card-scroll">
                    <!-- image -->
                    <img class="card-img-top" src="./common/img/women.jpeg" alt="Smile" height="350px" width="95%">
                    <!-- content -->
                    <div class="card-body">
                        <h5 class="card-title">The mysterious smile</h5>
                        <p class="card-text">
                            For the nature of women is closely allied to art.
                        </p>
                        <div class="card-details">
                            <p>Rs 850 </p>
                            <button style="font-size:20px"> <i class="fa fa-shopping-basket"></i> Basket </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    // php function to generate the footer
    generateJavaScript($pageName);
    generateFooter($pageName);
?>