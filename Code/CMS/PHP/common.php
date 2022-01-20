<?php
// Function for navigation bar
    function navbar() {
        echo '<nav>';
        echo '<div class="menu-icon">';
        echo '<span class="fas fa-bars"></span>';
        echo '</div>';       
        echo '<div class="logo">';
        echo '<img src="./IMAGES/favicon.png"alt="Ti Moris"width="100" height="80" >';
        echo 'Ti Moris';
        echo '</div>';
        echo '<div class="nav-items">';
        echo '<li><a href="index.php">Home</a></li>';
        echo '<li><a href="login.php">Login</a></li>';
        echo '<li><a href="addproducts.php">Add Products</a></li>';
        echo '<li><a href="viewproducts.php">View Products</a></li>';
        echo '<li><a href="deleteproducts.php">Delete Products</a></li>';
        echo '<li><a href="editproducts.php">Edit Products</a></li>';
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
 