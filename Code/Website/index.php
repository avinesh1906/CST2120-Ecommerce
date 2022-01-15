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
<?php
    // php function to generate the footer
    generateFooter($pageName);
?>