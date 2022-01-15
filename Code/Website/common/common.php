<?php

// Outputs the header for the page and opening body tag
// $title: will be the page title to be shown in the head
// $directoryname: will be the directory containing the css and other related files 

function generateHeader($title, $directoryname){
    echo '<!DOCTYPE html>';
        echo '<html>';
        echo '<!-- Required meta tags -->';
        echo '<meta charset="utf-8">';
        echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';

        echo '<!-- Tab title-->';
        echo '<title>Ti Moris: ' . $title . '</title>';

        echo '<!-- Bootstrap CSS -->';
        echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">';
        
        echo '<!-- icon CSS -->';
        echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">';
        

        // choose whether the directoryname is home or not
        // the path for other websites are different for home 
        if ($directoryname == 'home') {
            echo '<!-- Tab icon-->';
            echo '<link href="../favicon.png" rel="icon">';

            echo '<!-- External common CSS file -->';
            echo '<link href="./common/css/styles.css" type="text/css" rel="stylesheet">';    
            
            echo '<!-- External '. $directoryname . ' CSS -->';
            echo '<link href="./'. $directoryname .'/css/styles.css" type="text/css" rel="stylesheet">';
            
            echo '<!-- Bootstrap JS -->';
            echo '<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>';
            echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>';
            echo '<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>';
            
        } else {
            // other directory locations
            echo '<!-- Tab icon-->';
            echo '<link href="../../favicon.png" rel="icon">';

            echo '<!-- External common CSS file -->';
            echo '<link href="../common/css/styles.css" type="text/css" rel="stylesheet">';    
            
            echo '<!-- External '. $directoryname . ' CSS -->';
            echo '<link href="./css/styles.css" type="text/css" rel="stylesheet">';
        }

        echo '</head>';
        echo '<body>';

}

// Outputs the navigation bar 
function generateNavBar($pagename){
    echo '<!-- Navigation '. $pagename .'Bar-->';
    echo '<nav class="nav-bar sticky-top">';
    echo '<!-- Navigation Icon-->';
    echo '<a class="navbar-brand">';

    // choose path location depending whether it is accessing from home page or not
    if ($pagename == "Home"){
        echo '<img src="../favicon.png"  width="60" height="60" alt="navigation bar icon">';
    } else {
        echo '<img src="../../favicon.png"  width="60" height="60" alt="navigation bar icon">';
    }

    echo '<span>TiMoris</span>';
    echo '</a>';
    echo '<div class="navigation-container ">';

    echo '<div class="nav-category">';
    echo '<ul class="navbar-item">';

    // Array of pages to link
    $linkNames = array("Home", "Pencil", "Watercolor", "Graffiti", "Spray");
    $linkFolderHomeRoot = array("./", "./pencil/", "./watercolor/", "./graffiti/", "./spray/");
    $linkFolderName = array("../", "../pencil/", "../watercolor/", "../graffiti/", "../spray/");
    $linkFileName = array("index.php", "pencil.php", "watercolor.php", "graffiti.php", "graffiti.php");

    // Loop through the navigation items 
    for ($x = 0; $x < count($linkNames); $x++){
        echo '<li class="nav-item">';
        echo '<a class="nav-link"';
        
        // If current item in the linkName array is the chosen page, id active will form part of the html code
        if ($linkNames[$x] == $pagename){
            echo 'id="active"';
        }
        
        // different path for home and other pages
        if ($pagename == "Home"){
            echo 'name ="'.$linkNames[$x].'" href="'. $linkFolderHomeRoot[$x] . $linkFileName[$x] . '">' . $linkNames[$x] .'</a>';
        } else {
            echo 'name ="'.$linkNames[$x].'" href="'. $linkFolderName[$x] . $linkFileName[$x] . '">' . $linkNames[$x] .'</a>';
        }

        echo '</li>';
    }
    echo '</ul>';
    echo '</div>';

    echo '
        <div class="nav-center">
        <form>
            <input type="text" placeholder="Search" name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
        </div>
    ';

    echo '<div class="nav-other">';
    echo '<ul class="navbar-item">';

        // Array of pages to link
    $linkNames = array("About Us", "Sign In", "Cart");
    $linkFolderHomeRoot = array("./aboutus/", "./signin/", "./cart/");
    $linkFolderName = array( "../aboutus/", "../signin/", "../cart/");
    $linkFileName = array("aboutus.php", "signin.php", "cart.php");

    // Loop through the navigation items 
    for ($x = 0; $x < count($linkNames); $x++){
        echo '<li class="nav-item">';
        echo '<a class="nav-link"';
        
        // If current item in the linkName array is the chosen page, id active will form part of the html code
        if ($linkNames[$x] == $pagename){
            echo 'id="active"';
        }
        
        // different path for home and other pages
        if ($pagename == "Home"){
            echo 'name ="'.$linkNames[$x].'" href="'. $linkFolderHomeRoot[$x] . $linkFileName[$x] . '">' . $linkNames[$x] .'</a>';
        } else {
            echo 'name ="'.$linkNames[$x].'" href="'. $linkFolderName[$x] . $linkFileName[$x] . '">' . $linkNames[$x] .'</a>';
        }

        echo '</li>';
    }
    echo '</ul>';
    echo '</div>';
    echo '</div>';
    echo '</nav>';

    echo '<div class="main-body">';
}

//Outputs closing body tag and closing HTML tag
function generateFooter($pagename){

    echo '</div>';

    echo '
        <footer class="footer">
            <div class="left-Footer">

                <h3>Ti<span>Moris</span></h3>

                <p class="footer-links">
                    <a href="#" id="link1">Home</a>
                    <a href="#">Pencil</a>
                
                    <a href="#">Watercolor</a>
                
                    <a href="#">Graffiti</a>
                    
                    <a href="#">Spray</a>

                    <a href="#">About us</a>
                </p>

                <p class="author">
                    Avinesh Culloo and Smreeti Jugnarain © 2022
                </p>
            </div>

            <div class="center-footer">
                <div>
                    <i class="fa fa-map-marker"></i>
                    <p><span>10 A. Rue de Labourdonnais</span>BoVallon, Maurice</p>
                </div>

                <div>
                    <i class="fa fa-phone"></i>
                    <p>+230 58352200</p>
                </div>

                <div>
                    <i class="fa fa-envelope"></i>
                    <p><a href="mailto:avismreets">avismreets@timoris.com</a></p>
                </div>

            </div>

            <div class="footer-right">

                <p class="description">
                    <span>Pablo Picasso</span>
                    “We all know that Art is not truth. Art is a lie that 
                    makes us realize truth at least the truth that is given 
                    us to understand. The artist must know the manner whereby 
                    to convince others of the truthfulness of his lies.”
                </p>

                <div class="footer-logo">

                    <!-- Facebook -->
                    <a class="btn btn-outline-light btn-floating m-1" href="https://www.facebook.com/keshav.culloo" target="_blank" role="button">
                        <i class="fa fa-facebook icon"></i>
                    </a>
                    <!-- Instagram -->
                    <a class="btn btn-outline-light btn-floating m-1" href="https://www.instagram.com/smreeti_j/" target="_blank" role="button">
                        <i class="fa fa-instagram icon"></i>
                    </a>
                    <!-- Linkedin -->
                    <a class="btn btn-outline-light btn-floating m-1" href="https://linkedin.com/in/smreeti-jugnarain-a9317a219" target="_blank" role="button">
                        <i class="fa fa-linkedin icon"></i>
                    </a>
                    <!-- Github  -->
                    <a class="btn btn-outline-light btn-floating m-1" href="https://github.com/avinesh1906" target="_blank" role="button">
                        <i class="fa fa-github icon"></i>
                    </a>
                </div>
            </div>
        </footer>
    ';
    echo '</body>';
    echo '</html>';
}
