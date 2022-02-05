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
    <!-- Filter container -->
    <div class="filter">
        <!-- Availability filter -->
        <div class="availability">
            <!-- Title -->
            <div class="availability-title">
                <a> AVAILABILITY </a>
                <div class="lineBreak"></div>
                <div id="details"> Click on box to filter availability </div>
            </div>
            <!-- Checkbox -->
            <div class="availability-list">  
                <input type="checkbox" id="instock" name="instock" value="InStock">
                <label for="instock"> In Stock</label> 
                <br>
                <input type="checkbox" id="outofstock" name="outofstock" value="OutOfStock">
                <label for="outofstock"> Out of Stock</label>
            </div>
        </div>
        <!-- Price filter -->
        <div class="price">
            <!-- Title -->
            <div class="price-title">
                <a> PRICE </a>
                <div class="lineBreak"></div>
                <div id="details">  Use slider or enter min and max price  </div>
            </div>
            <!-- Price range -->
            <div class="price-range">  
                <!-- Price Input box -->
                <div class="price-input">
                    <!-- Min range -->
                    <div class="range">
                        <span> Min </span>
                        <input type="number" class="minInput" value="500">
                    </div>
                    <!-- - between input box -->
                    <div class="separator">-</div>
                    <!-- Max range -->
                    <div class="range">
                        <span> Max </span>
                        <input type="number" class="maxInput" value="1500">
                    </div>
                </div>
                <!-- Slider  -->
                <div class="slider">
                    <div class="progress"></div>
                </div>
                <!-- Range Input -->
                <div class="range-input">
                    <input type="range" class="range-min" min="0" max="2000" value="500" step="100">
                    <input type="range" class="range-max" min="0" max="2000" value="1500" step="100">
                </div>
            </div>
        </div>
        <!-- Size filter -->
        <div class="size">
            <!-- Title -->
            <div class="size-title">
                <a> SIZE </a>
                <div class="lineBreak"></div>
                <div id="details">  Choose your painting size  </div>
            </div>
            <!-- Size checklist -->
            <div class="size-checklist">  
                <input type="checkbox" id="A2" name="A2" value="A2">
                <label for="A2"> 420 x 594 mm</label>
                <br>
                <input type="checkbox" id="A3" name="A3" value="A3">
                <label for="A3">297 x 420 mm</label>
                <br>
                <input type="checkbox" id="A4" name="A4" value="A4">
                <label for="A4">210 x 297 mm</label>
            </div>
        </div>
    </div>
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
                    <li><button class="dropdown-item" type="button">Featured</button></li>
                    <li><button class="dropdown-item" type="button">Best Selling</button></li>
                    <li><button class="dropdown-item" type="button">Price, Low to High</button></li>
                    <li><button class="dropdown-item" type="button">Price, High to Low</button></li>
                    <li><button class="dropdown-item" type="button">Alphabetically, A to Z</button></li>
                    <li><button class="dropdown-item" type="button">Alphabetically, Z to A</button></li>
                </ul>
            </div>
        </div>
        <!-- make use of javascript to generate the content -->
        <div class="content">
            <div class="row row-cols- row-cols-md-3 g-4">
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