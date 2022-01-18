<?php
    // php variables
    $pageName = 'Abstract';
    $folderName = 'abstract';

    // include the common.php which contains the php functions
    include('../common/common.php');

    // call the php functions 
    generateHeader($pageName, $folderName);
    generateNavBar($pageName);
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
        <div class="content">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col">
                    <div class="card">
                        <!-- image -->
                        <img class="card-img-top" src="./img/bird.jpg" alt="Bird" height="250px">
                        <!-- content -->
                        <div class="card-body">
                            <h5 class="card-title">Bird</h5>
                            <div class="card-details">
                                <p>Rs 350 </p>
                                <button style="font-size:20px"> <i class="fa fa-shopping-basket"></i> Basket </button>
                            </div>    
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <!-- image -->
                        <img class="card-img-top" src="./img/city.jpg" alt="City" height="250px">
                        <!-- content -->
                        <div class="card-body">
                            <h5 class="card-title">City</h5>
                            <div class="card-details">
                                <p>Rs 750 </p>
                                <button style="font-size:20px"> <i class="fa fa-shopping-basket"></i> Basket </button>
                            </div>    
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <!-- image -->
                        <img class="card-img-top" src="./img/red.jpg" alt="red" height="250px" >
                        <!-- content -->
                        <div class="card-body">
                            <h5 class="card-title">Red</h5>
                            <div class="card-details">
                                <p>Rs 1750 </p>
                                <button style="font-size:20px"> <i class="fa fa-shopping-basket"></i> Basket </button>
                            </div>    
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <!-- image -->
                        <img class="card-img-top" src="./img/skyline.jpg" alt="Skyline" height="250px" >
                        <!-- content -->
                        <div class="card-body">
                            <h5 class="card-title">Skyline</h5>
                            <div class="card-details">
                                <p>Rs 1250 </p>
                                <button style="font-size:20px"> <i class="fa fa-shopping-basket"></i> Basket </button>
                            </div>    
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <!-- image -->
                        <img class="card-img-top" src="./img/water_blue.jpg" alt="Water" height="250px" >
                        <!-- content -->
                        <div class="card-body">
                            <h5 class="card-title">Water</h5>
                            <div class="card-details">
                                <p>Rs 1000 </p>
                                <button style="font-size:20px"> <i class="fa fa-shopping-basket"></i> Basket </button>
                            </div>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    // php function to generate the footer
    generateJavaScript($pageName);
    generateFooter($pageName);
?>