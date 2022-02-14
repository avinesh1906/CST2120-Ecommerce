<?php
    // php variables
    $pageName = 'Oil';
    $folderName = 'oil';

    // include the common.php which contains the php functions
    include('../common/common.php');

    // call the php functions 
    generateHeader($pageName, $folderName);
    generateNavBar($pageName);
    generateLoggedMsg($pageName);
?>
<!-- Title -->
<div class="product-title">
    Oil Painting
    <!-- Title bottom border line -->
    <div id="borderBot"></div>
</div>
<!-- Description -->
<div class="product-description">
    <!-- Image -->
    <div class="image">
        <img src="../common/img/dodo_oil.jpg" alt="dodo oil" 
            height="250px">
    </div>
    <!-- Body Content -->
    <div class="body-description">
    Oil painting is a type of painting produced using oil-based paints. 
    It involves using pigments that use a medium of drying oil as the binder and painting with them on a canvas.
    <br>
    Oil paints are one of the most well-respected and popular types of paints and have long been a favored medium 
    of fine artists. Oil paints produce excellent tones and colors which differentiate oil paints from other painting 
    mediums and materials. Oil paints can also create both satisfactory linear treatment and crisp effects. 
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
        <div class="content">
            <div class="row row-cols- row-cols-md-3 g-4" id="OilContent">
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