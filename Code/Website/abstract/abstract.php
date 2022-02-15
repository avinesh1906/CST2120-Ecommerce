<?php
    // php variables
    $pageName = 'Abstract';
    $folderName = 'abstract';

    // include the common.php which contains the php functions
    include('../common/common.php');

    // call the php functions 
    generateHeader($pageName, $folderName);
    generateNavBar($pageName);
    generateLoggedMsg($pageName);
?>
<!-- Title -->
<div class="product-title">
    Abstract Painting
    <!-- Title bottom border line -->
    <div id="borderBot"></div>
</div>
<!-- Description -->
<div class="product-description">
    <!-- Image -->
    <div class="image">
        <img src="./img/umbrella.jpeg" alt="Umbrella" 
            height="250px">
    </div>
    <!-- Body Content -->
    <div class="body-description">
    Abstract art is art that does not attempt to represent an accurate 
    depiction of a visual reality but instead use shapes, colours, forms and 
    gestural marks to achieve its effect
    <br>
    Abstract art, non-figurative art, non-objective art, and non-representational 
    art, are closely related terms. They are similar, but perhaps not of identical 
    meaning.
    <br>
    Abstraction indicates a departure from reality in depiction of imagery in art. 
    This departure from accurate representation can be slight, partial, or complete. 
    Abstraction exists along a continuum. 
</div>
</div>
<!-- Shopping container -->
<div class="shopping">
    <!-- All product list -->
    <div class="product-list">
        <!-- Header -->
        <div class="header">
            <!-- Default dropstart button -->
            <div class="btn-group dropstart">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    Sort By
                </button>
                <ul class="dropdown-menu">
                    <!-- Dropdown menu links -->
                    <li><button class="dropdown-item" type="button" onclick="priceAsc('<?php echo $pageName ?>')">Price, Low to High</button></li>
                    <li><button class="dropdown-item" type="button" onclick="priceDesc('<?php echo $pageName ?>')">Price, High to Low</button></li>
                    <li><button class="dropdown-item" type="button" onclick="alphaAsc('<?php echo $pageName ?>')">Alphabetically, A to Z</button></li>
                    <li><button class="dropdown-item" type="button" onclick="alphaDesc('<?php echo $pageName ?>')">Alphabetically, Z to A</button></li>
                </ul>
            </div>
        </div>
        <!-- make use of javascript to generate the content -->
        <!-- Abstract arts product list -->
        <div class="content">
            <!-- Card layout -->
            <div class="row row-cols-1 row-cols-md-3 g-4" id="AbstractContent">
            </div>
        </div>
    </div>
</div>
<?php
    // php function to generate the footer
    generateJavaScript($pageName);
    // php function to generate the footer
    generateFooter($pageName);
?>