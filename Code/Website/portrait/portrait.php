<?php
    // php variables
    $pageName = 'Portrait';
    $folderName = 'portrait';

    // include the common.php which contains the php functions
    include('../common/common.php');

    // call the php functions 
    generateHeader($pageName, $folderName);
    generateNavBar($pageName);
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
            <div class="row row-cols- row-cols-md-4 g-4">
                <div class="col">
                    <div class="card">
                        <!-- image -->
                        <img class="card-img-top" src="../common/img/pencil_African.jpg" alt="African" height="300px" >
                        <!-- content -->
                        <div class="card-body">
                            <h5 class="card-title">Yelling </h5>
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
                        <img class="card-img-top" src="../common/img/marilyn.jpeg" alt="Marilyn" height="300px">
                        <!-- content -->
                        <div class="card-body">
                            <h5 class="card-title">Marilyn Monroe</h5>
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
                        <img class="card-img-top" src="../common/img/women.jpeg" alt="woman" height="300px">
                        <!-- content -->
                        <div class="card-body">
                            <h5 class="card-title">La Sourire</h5>
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
                        <img class="card-img-top" src="../common/img/women_face.jpeg" alt="Woman Face" height="300px">
                        <!-- content -->
                        <div class="card-body">
                            <h5 class="card-title">La beauté de faiblesse</h5>
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
                        <img class="card-img-top" src="../common/img/bonnie.jpg" alt="bonnie" height="300px">
                        <!-- content -->
                        <div class="card-body">
                            <h5 class="card-title">Bonnie Painting</h5>
                            <div class="card-details">
                                <p>Rs 1000 </p>
                                <button style="font-size:20px"> <i class="fa fa-shopping-basket"></i> Basket </button>
                            </div>    
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <!-- image -->
                        <img class="card-img-top" src="../common/img/chinese.jpeg" alt="Chinese" height="300px">
                        <!-- content -->
                        <div class="card-body">
                            <h5 class="card-title">Shameless spring</h5>
                            <div class="card-details">
                                <p>Rs 1000 </p>
                                <button style="font-size:20px"> <i class="fa fa-shopping-basket"></i> Basket </button>
                            </div>    
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <!-- image -->
                        <img class="card-img-top" src="../common/img/desi.jpg" alt="Desi" height="300px">
                        <!-- content -->
                        <div class="card-body">
                            <h5 class="card-title">Desi</h5>
                            <div class="card-details">
                                <p>Rs 1000 </p>
                                <button style="font-size:20px"> <i class="fa fa-shopping-basket"></i> Basket </button>
                            </div>    
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <!-- image -->
                        <img class="card-img-top" src="./img/kaya.jpg" alt="Kaya" height="300px">
                        <!-- content -->
                        <div class="card-body">
                            <h5 class="card-title">Kaya</h5>
                            <div class="card-details">
                                <p>Rs 1000 </p>
                                <button style="font-size:20px"> <i class="fa fa-shopping-basket"></i> Basket </button>
                            </div>    
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <!-- image -->
                        <img class="card-img-top" src="./img/bob_marley.jpg" alt="Bob Marley" height="300px">
                        <!-- content -->
                        <div class="card-body">
                            <h5 class="card-title">Bob Marley</h5>
                            <div class="card-details">
                                <p>Rs 1000 </p>
                                <button style="font-size:20px"> <i class="fa fa-shopping-basket"></i> Basket </button>
                            </div>    
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <!-- image -->
                        <img class="card-img-top" src="./img/dadi.jpg" alt="Dadi" height="300px">
                        <!-- content -->
                        <div class="card-body">
                            <h5 class="card-title">Dadi</h5>
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