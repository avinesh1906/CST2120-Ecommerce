<?php
    // php variables
    $pageName = 'Cart';
    $folderName = 'cart';

    // include the common.php which contains the php functions
    include('../common/common.php');

    // call the php functions 
    generateHeader($pageName, $folderName);
    generateNavBar($pageName);
?>
<div class="cartHeader">
    <div class="title">
        Your Cart
        <div id="line"></div>
    </div>
    <div class="continue">
        <a href="../index.php">Continue Shopping </a>
    </div>
</div>
<div class="cartBody">
    <div class="subtitle">
        <div class="product">PRODUCT</div>
        <div class="qty">QUANTITY</div>
        <div class="total">TOTAL</div>
    </div>
    <div id="line"></div>
    <div class="cartItems">
        <div class="item">
            <div class="details">
                <div class="img">
                    <img src="../common/img/desi.jpg" alt="Desi" width="200px" height="200px">
                </div>
                <div class="description">
                    <div class="title">
                        Desi
                    </div>
                    <div class="category">Portrait Painting</div>
                    <div id="price"> Rs 800 </div>
                    <div class="size">
                        420 x 594 mm 
                    </div>                
                </div>
            </div>
            <div class="qty">
                <div class="counter">
                    <div class="minus"> 
                        <button>-</button> 
                    </div>
                    <div class="number"> 2 </div>
                    <div class="add"> 
                        <button>+</button> 
                     </div>
                </div>
                <div class="deleteBtn">
                    <i class="fa fa-trash-o" style="font-size:34px; color:red"></i>
                </div>
            </div>
            <div class="price">
                Rs 1600
            </div>
        </div>
    </div>
</div>
<div class="cartFooter">
    <div class="subtotal">
        <a id="title">Subtotal: </a>
        Rs 1600
    </div>
    <a id="details" >Taxes and Shipping calculated at checkout</a>
    <div class="checkoutBtn">
        <button onclick="location.href='../checkout/checkout.php'">Check Out</button>
    </div>
</div>
<?php
    // php function to generate the footer
    generateJavaScript($pageName);
    generateFooter($pageName);
?>