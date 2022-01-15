<?php
    // php variables
    $pageName = 'Home';
    $folderName = 'home';

    // include the common.php which contains the php functions
    include('./common/common.php');

    // call the php functions 
    generateHeader($pageName, $folderName);
    generateNavBar($pageName);
?>
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="carousel-content">
                <div class="carousel-image">
                    <img src="./common/img/watercolor_landscape_mauritius.jpg" alt="landscape mauritius" width= "100%" 
                    height="500px">
                </div>
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
        <div class="carousel-item">
            <div class="carousel-content">
                <div class="carousel-image">
                    <img src="./common/img/watercolor_LeMorne.jfif" alt="le morne" width= "100%" 
                        height="500px">
                </div>
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
        <div class="carousel-item">
            <div class="carousel-content">
                <div class="carousel-image">
                    <img src="./common/img/sega.jpg" alt="sega"width= "100%" 
                    height="500px">
                </div>
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
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<div class="top-product">
    <div class="title">
        <h4> Top Product </h4>
    </div>
    <div class="options">
        <ul class="options-item">
            <li> FEATURED </li>
            <li> LATEST </li>
            <li> BESTSELLER </li>
        </ul>
    </div>

    <div class="featured">
        <div class="card-deck row">
            <div class="card-scroll">
                <img class="card-img-top" src="./common/img/marilyn.jpeg" alt="marilyn" height="450px" width="95%">
                <div class="card-body">
                    <h5 class="card-title">Marilyn Monroe</h5>
                    <p class="card-text">If I'd observed all the rules, I'd never have got anywhere</p>
                    <div class="card-details">
                        <p>Rs 1500 </p>
                        <button style="font-size:20px"> <i class="fa fa-shopping-basket"></i> Basket </button>
                    </div>
                </div>
            </div>
            <div class="card-scroll">
                <img class="card-img-top" src="./common/img/lion.jpeg" alt="lion" height="450px" width="95%">
                <div class="card-body">
                    <h5 class="card-title"> Le Désir d'imagination</h5>
                    <p class="card-text">L’imagination fait du désir une passion heureuse.</p>
                    <div class="card-details">
                        <p>Rs 800 </p>
                        <button style="font-size:20px"> <i class="fa fa-shopping-basket"></i> Basket </button>
                    </div>
                </div>
            </div>
            <div class="card-scroll">
                <img class="card-img-top" src="./common/img/women_face.jpeg" alt="women face" height="450px" width="95%">
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
            <div class=" card-scroll">
                <img class="card-img-top" src="./common/img/chinese.jpeg" alt="Chinese" height="450px" width="95%">
                <div class="card-body">
                    <h5 class="card-title">Shameless spring</h5>
                    <p class="card-text">The first blooms of spring always make my heart sing</p>
                    <div class="card-details">
                        <p>Rs 850 </p>
                        <button style="font-size:20px"> <i class="fa fa-shopping-basket"></i> Basket </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="latest">
        <div class="card-deck row">
            <div class="card-scroll">
                <img class="card-img-top" src="./common/img/cat.jpeg" alt="cat" height="450px" width="95%">
                <div class="card-body">
                    <h5 class="card-title">Marilyn Monroe</h5>
                    <p class="card-text">If I'd observed all the rules, I'd never have got anywhere</p>
                    <div class="card-details">
                        <p>Rs 1500 </p>
                        <button style="font-size:20px"> <i class="fa fa-shopping-basket"></i> Basket </button>
                    </div>
                </div>
            </div>

            <div class="card-scroll">
                <img class="card-img-top" src="./common/img/women.jpeg" alt="women" height="450px" width="95%">
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
            <div class=" card-scroll">
                <img class="card-img-top" src="./common/img/sunset.jpeg" alt="Chinese" height="450px" width="95%">
                <div class="card-body">
                    <h5 class="card-title">Shameless spring</h5>
                    <p class="card-text">The first blooms of spring always make my heart sing</p>
                    <div class="card-details">
                        <p>Rs 850 </p>
                        <button style="font-size:20px"> <i class="fa fa-shopping-basket"></i> Basket </button>
                    </div>
                </div>
            </div>
            <div class=" card-scroll">
                <img class="card-img-top" src="./common/img/lacote.png" alt="lacote" height="450px" width="95%">
                <div class="card-body">
                    <h5 class="card-title">Shameless spring</h5>
                    <p class="card-text">The first blooms of spring always make my heart sing</p>
                    <div class="card-details">
                        <p>Rs 850 </p>
                        <button style="font-size:20px"> <i class="fa fa-shopping-basket"></i> Basket </button>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="bestseller">
        <div class="card-deck row">
            <div class="card-scroll">
                <img class="card-img-top" src="./common/img/wolves.jpeg" alt="wolf" height="450px" width="95%">
                <div class="card-body">
                    <h5 class="card-title"> Le Désir d'imagination</h5>
                    <p class="card-text">L’imagination fait du désir une passion heureuse.</p>
                    <div class="card-details">
                        <p>Rs 800 </p>
                        <button style="font-size:20px"> <i class="fa fa-shopping-basket"></i> Basket </button>
                    </div>
                </div>
            </div>
            <div class="card-scroll">
                <img class="card-img-top" src="./common/img/watercolor_landscape_mauritius.jpg" alt="mauritius landscape" height="450px" width="95%">
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
            <div class=" card-scroll">
                <img class="card-img-top" src="./common/img/sunset.jpeg" alt="Chinese" height="450px" width="95%">
                <div class="card-body">
                    <h5 class="card-title">Shameless spring</h5>
                    <p class="card-text">The first blooms of spring always make my heart sing</p>
                    <div class="card-details">
                        <p>Rs 850 </p>
                        <button style="font-size:20px"> <i class="fa fa-shopping-basket"></i> Basket </button>
                    </div>
                </div>
            </div>
            <div class=" card-scroll">
                <img class="card-img-top" src="./common/img/lacote.png" alt="lacote" height="450px" width="95%">
                <div class="card-body">
                    <h5 class="card-title">Shameless spring</h5>
                    <p class="card-text">The first blooms of spring always make my heart sing</p>
                    <div class="card-details">
                        <p>Rs 850 </p>
                        <button style="font-size:20px"> <i class="fa fa-shopping-basket"></i> Basket </button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php
    // php function to generate the footer
    generateFooter($pageName);
?>