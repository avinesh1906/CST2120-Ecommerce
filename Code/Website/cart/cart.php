<?php
    // php variables
    $pageName = 'Cart';
    $folderName = 'cart';

    // include the common.php which contains the php functions
    include('../common/common.php');

    // call the php functions 
    generateHeader($pageName, $folderName);
    generateNavBar($pageName);
    generateLoggedMsg($pageName);
?>
<!-- Cart Header -->
<div class="cartHeader">
    <!-- Title -->
    <div class="title">
        Your Cart
        <div id="line"></div>
    </div>
    <!-- Continue shopping link -->
    <div class="continue">
        <a href="../index.php">Continue Shopping </a>
    </div>
</div>
<!-- Cart Body -->
<div class="cartBody">
    <!-- Body subtitle -->
    <div class="subtitle">
        <div class="product">PRODUCT</div>
        <div class="qty">QUANTITY</div>
        <div class="total">TOTAL</div>
    </div>
    <div id="line"></div>
    <!-- Cart list of items -->
    <div class="cartItems">
        <!-- cart item -->
        <div class="item">
            <!-- item details -->
            <div class="details">
                <!-- image -->
                <div class="img">
                    <img src="../common/img/desi.jpg" alt="Desi" width="200px" height="200px">
                </div>
                <!-- description -->
                <div class="description">
                    <!-- description title -->
                    <div class="title">
                        Desi
                    </div>
                    <!-- other descriptions -->
                    <div class="category">Portrait Painting</div>
                    <div id="price"> Rs 800 </div>
                    <div class="size">
                        420 x 594 mm 
                    </div>                
                </div>
            </div>
            <!-- qty section -->
            <div class="qty">
                <!-- counter -->
                <div class="counter">
                    <!-- decrease -->
                    <div class="minus"> 
                        <button>-</button> 
                    </div>
                    <!-- qty number -->
                    <div class="number"> 2 </div>
                    <!-- increase -->
                    <div class="add"> 
                        <button>+</button> 
                     </div>
                </div>
                <!-- delete btn to remove item -->
                <div class="deleteBtn">
                    <i class="fa fa-trash-o" style="font-size:34px; color:red"></i>
                </div>
            </div>
            <!-- price -->
            <div class="price">
                Rs 1600
            </div>
        </div>
    </div>
</div>
<!-- cart footer -->
<div class="cartFooter">
    <!-- subtotal -->
    <div class="subtotal">
        <a id="title">Subtotal: </a>
        Rs 1600
    </div>
    <!-- footer details -->
    <a id="details" >Taxes and Shipping calculated at checkout</a>
    <!-- check out button -->
    <div class="checkoutBtn">
        <button onclick="location.href='../checkout/checkout.php'">Check Out</button>
    </div>
</div>
<?php
    // php function to generate the footer
    generateJavaScript($pageName);
    // php function to generate the footer
    generateFooter($pageName);
?>