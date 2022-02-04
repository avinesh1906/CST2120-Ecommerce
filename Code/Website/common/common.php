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
        echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">';
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
            echo'<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>';
            echo '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>';
            echo '<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>';
            echo '<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>';
        
           
        } else {
            // other directory locations
            echo '<!-- Tab icon-->';
            echo '<link href="../../favicon.png" rel="icon">';

            echo '<!-- External common CSS file -->';
            echo '<link href="../common/css/styles.css" type="text/css" rel="stylesheet">';    
            
            echo '<!-- External '. $directoryname . ' CSS -->';
            echo '<link href="./css/styles.css" type="text/css" rel="stylesheet">';
            echo '<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>';
            echo'<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>';
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
    $linkNames = array("Home", "Portrait", "Landscape", "Oil", "Abstract", "Historical");
    $linkFolderHomeRoot = array("./", "./portrait/", "./landscape/", "./oil/", "./abstract/", "./historical/");
    $linkFolderName = array("../", "../portrait/", "../landscape/", "../oil/", "../abstract/", "../historical/");
    $linkFileName = array("index.php", "portrait.php", "landscape.php", "oil.php", "abstract.php" ,"historical.php");

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
    $linkNames = array("Profile", "Sign In", "Cart");
    $linkFolderHomeRoot = array("./profile/", "./signin/", "./cart/");
    $linkFolderName = array( "../profile/", "../signin/", "../cart/");
    $linkFileName = array("profile.php", "signin.php", "cart.php");

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

}

// function to display
// 1. Msg to log in if not logged in
// 2. Msg to display logged user if logged in
function generateLoggedMsg($pagename){
    echo'
    <div class="loggedMessage">
        <div class="logged">
            <a>Logged as Avinesh Culloo</a>
        </div>
        <div class="notLogged">
            <a>Register or Sign in for recommendation and product track</a>
        </div>
    </div>';
    echo '<div class="main-body">';
}

//Outputs closing body tag and closing HTML tag
function generateFooter($pagename){

    echo '</div>';

    echo '
        <footer class="footer">
            <div class="left-Footer">

                <h3>Ti<span>Moris</span></h3>

                <p class="footer-links">';
                // Array of pages to link
                $linkNames = array("Home", "Portrait", "Landscape", "Oil", "Abstract", "Historical", "Profile");
                $linkFolderHomeRoot = array("./", "./portrait/", "./landscape/", "./oil/", "./abstract/", "./historical/", "./profile/");
                $linkFolderName = array("../", "../portrait/", "../landscape/", "../oil/", "../abstract/", "../historical/", "../profile/");
                $linkFileName = array("index.php", "portrait.php", "landscape.php", "oil.php", "abstract.php" ,"historical.php", "profile.php");
                
                for ($x = 0; $x < count($linkNames); $x++){
                    if ($pagename == "Home"){
                        if ($linkNames[$x] == "Home")
                            echo '<a href="./index.php" id="link1">Home &nbsp </a>';
                        else {
                            echo '<a href="'. $linkFolderHomeRoot[$x] . $linkFileName[$x] . '">' . $linkNames[$x] .' &nbsp </a>';
                        }
                    } else {
                        if ($linkNames[$x] == "Home")
                            echo '<a href="../index.php" id="link1">Home &nbsp </a>';
                        else {
                            echo '<a href="'. $linkFolderName[$x] . $linkFileName[$x] . '">' . $linkNames[$x] .' &nbsp </a>';
                        }
                    }
                }
                echo '</p>

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
}

function generateJavaScript($title){
    // Array Dictionary 
    $linkNames = array(
        "Home" => "./home/js/home.js", 
        "Portrait" => "./js/portrait.js", 
        "Oil" => "./js/oil.js", 
        "Cart" => "./js/cart.js", 
        "Profile" => "./js/profile.js",
        "Personal Information" => "./js/profile.js",
        "Address" => "./js/profile.js",
        "Password" => "./js/profile.js",
        "Historical" => "./js/historical.js",
        "Landscape" => "./js/landscape.js",
        "Register" => "./js/register.js",
        "Sign In" => "./js/signin.js",
        "Abstract" => "./js/abstract.js",
        "Check Out" => "./js/checkout.js"
    );
    echo '<script src = "'. $linkNames[$title] .'">'; 
    echo '</script>';

    echo '<script ';
    if ($title == "Home") {
        echo 'src = "./common/js/common.js">';
    } else if ($title == "Register"){
        echo ' type="text/javascript" language="javascript" src = "../common/js/common.js">';
    } else {
        echo 'src = "../common/js/common.js">';
    }

    echo '</script>';
    echo '</body>';
    echo '</html>';
}