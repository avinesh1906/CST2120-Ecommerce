<?php
    // php variables
    $pageName = 'Portrait';
    $folderName = 'portrait';

    // include the common.php which contains the php functions
    include('../common/common.php');

    // call the php functions 
    generateHeader($pageName, $folderName);
    generateNavBar($pageName);
    generateLoggedMsg($pageName);
?>
<!-- Title -->
<div class="product-title">
    Portrait Painting
    <!-- Title bottom border line -->
    <div id="borderBot"></div>
</div>
<!-- Description -->
<div class="product-description">
    <!-- Image -->
    <div class="image">
        <img src="../common/img/marilyn.jpeg" alt="Marilyn" 
            height="250px">
    </div>
    <!-- Body Content -->
    <div class="body-description">
    A strong portrait captivates viewers, draws them into the painting, and 
    engages their attention. Such a portrait painting causes the viewer to wonder 
    about the person depicted. In this way a portrait painting or drawing can function as a biography - 
    telling the story of that person's life. 
    <br>
    The artist will carefully craft visual clues to tell the story 
    of the person in the artwork. Portrait paintings can reveal the sitter's place in society, their hobbies or
    occupation, or aspects of their personality or beliefs. When looking at a portrait painting, ask yourself: 
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
            <div class="row row-cols- row-cols-md-4 g-4" id="PortraitContent">
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