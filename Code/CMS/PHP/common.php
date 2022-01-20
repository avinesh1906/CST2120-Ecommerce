<?php
    function navbar() {
        echo '<nav>';
        echo '<div class="menu-icon">';
        echo '<span class="fas fa-bars"></span>';
        echo '</div>';       
        echo '<div class="logo">';
        echo '<img src="../IMAGES/Ti Moris.png"alt="Ti Moris"width="100" height="80" >';
        echo 'Ti Moris';
        echo '</div>';
        echo '<div class="nav-items">';
        echo '<li><a href="#">Home</a></li>';
        echo '<li><a href="#">Sign up</a></li>';
        echo '<li><a href="#">Add Products</a></li>';
        echo '<li><a href="#">View Products</a></li>';
        echo '<li><a href="#">Delete Products</a></li>';
        echo '<li><a href="#">Edit Products</a></li>';
        echo '<li><a href="#">Customer Orders</a></li>';
        echo '</div>';
        echo '<div class="search-icon">';
        echo '<span class="fas fa-search"></span>';
        echo '</div>';
        echo '</nav>';
        echo '<div class="cancel-icon">';
        echo '<span class="fas fa-times"></span>';
        echo '</div>';
        echo '</nav>';

    }

    function footer() {
        echo '<footer class="footer1">';
        echo '<div class="footer-left">';
        echo '<h3>Ti<span>Moris</span></h3>';
        echo '<p class="footer-links">';       
        echo '<a href="#">Home</a>';
        echo '.';
        echo '<a href="#">Login</a> ';
        echo '.';
        echo '<a href="#">About</a>';
        echo '.';
        echo '<a href="#">Privacy Policy</a>';
        echo '.';
        echo '<a href="#">Faq</a>';
        echo '.';
        echo '<a href="#">Contact</a>';
        echo '</p>';
        echo '<p class="footer-company-name">Ti Moris &copy; 2022</p>';
        echo '</div>';
        echo '<div class="footer-center">';
        echo '<div>';
        echo '<i class="fa fa-map-marker"></i>';
        echo '<p><span>Avenue des Palmiers </span> Curepipe,Mauritius</p>';
        echo '/div>';
        echo '<div>';
        echo '<i class="fa fa-phone"></i>';
        echo '<p>+230 59484598</p>';
        echo '</div>';
        echo '<div>';
        echo '<i class="fa fa-envelope"></i>';
        echo '<p><a href="SJ983@live.mdx.ac.uk">SJ983@live.mdx.ac.uk</a></p>';
        echo '</div>';
        echo '<p><a href="SJ983@live.mdx.ac.uk">SJ983@live.mdx.ac.uk</a></p>';
        echo '</div>';
        echo '</div>';
        echo '<div class="footer-right">';
        echo '<p class="footer-company-about">';
        echo '<span>About the company</span>';
        echo 'Ecommerce website selling local paintings</p>';
        echo '<div class="footer-icons">';
        echo '<a href="#"><i class="fa fa-facebook"></i></a>';
        echo '<a href="#"><i class="fa fa-twitter"></i></a>';
        echo '<a href="#"><i class="fa fa-linkedin"></i></a>';
        echo '<a href="#"><i class="fa fa-github"></i></a>';
        echo '</div> ';
        echo '</footer>';


    }



?>
 