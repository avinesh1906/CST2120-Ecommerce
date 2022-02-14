<?php
    // php variables
    $pageName = 'Landscape';
    $folderName = 'landscape';

    // include the common.php which contains the php functions
    include('../common/common.php');

    // call the php functions 
    generateHeader($pageName, $folderName);
    generateNavBar($pageName);
    generateLoggedMsg($pageName);
?>
<!-- Title -->
<div class="product-title">
    Landscape Painting
    <!-- Title bottom border line -->
    <div id="borderBot"></div>
</div>
<!-- Description -->
<div class="product-description">
    <!-- Image -->
    <div class="image">
        <img src="../common/img/sunset.jpeg" alt="Sunset" 
            height="250px">
    </div>
    <!-- Body Content -->
    <div class="body-description">
        Landscape painting, also known as landscape art, is the 
        depiction of natural scenery such as mountains, valleys, 
        trees, rivers, and forests, especially where the main subject 
        is a wide view—with its elements arranged into a coherent composition. 
        <br>
        In other works, landscape backgrounds for figures can still 
        form an important part of the work. Sky is almost always included 
        in the view, and weather is often an element of the composition.
        <br>
        Detailed landscapes as a distinct subject are not found in all 
        artistic traditions, and develop when there is already a sophisticated 
        tradition of representing other subjects.
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
            <div class="row row-cols- row-cols-md-3 g-4" id="LandscapeContent">
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