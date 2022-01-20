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

?>
 