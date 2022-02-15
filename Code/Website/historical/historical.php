<?php
    // php variables
    $pageName = 'Historical';
    $folderName = 'historical';

    // include the common.php which contains the php functions
    include('../common/common.php');

    // call the php functions 
    generateHeader($pageName, $folderName);
    generateNavBar($pageName);
    generateLoggedMsg($pageName);
?>
<!-- Title -->
<div class="product-title">
    Historical Painting
    <!-- Title bottom border line -->
    <div id="borderBot"></div>
</div>
<!-- Description -->
<div class="product-description">
    <!-- Image -->
    <div class="image">
        <img src="../common/img/frenchShip.jpg" alt="French Ship" 
            height="250px">
    </div>
    <!-- Body Content -->
    <div class="body-description">
        The term history painting was introduced in the seventeenth 
        century to describe paintings with subject matter drawn from
        classical history and mythology, and the Bible – in the eighteenth
        century it was also used to refer to more recent historical subjects.
        <br>
        Although initially used to describe paintings with subjects drawn from ancient 
        Greek and Roman (classical) history, classical mythology, and the Bible; towards 
        the end of the eighteenth century history painting included modern historical subjects 
        such as the battle scenes painted by artists Benjamin West and John Singleton Copley.

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
            <div class="row row-cols- row-cols-md-3 g-4" id="HistoricalContent">
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