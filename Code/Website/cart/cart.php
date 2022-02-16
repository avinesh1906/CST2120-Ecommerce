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
<!-- danger alert div -->
<div class="alert alert-danger" id= "alert" role="alert">
    Cart Item deleted!
</div>
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
        
    </div>
</div>
<div id="noItem"> Shopping Cart Empty</div>
<!-- cart footer -->
<div class="cartFooter">
    <!-- subtotal -->
    <div class="subtotal">
    </div>
    <!-- footer details -->
    <a id="details" >Taxes and Shipping calculated at checkout</a>
    <!-- check out button -->
    <div class="checkoutBtn">
        <button onclick="location.href='../checkout/checkout.php'">Check Out</button>
    </div>
    <div id="sessionID" style="display:none"><?php echo session_id(); ?></div>
</div>
<?php
    // php function to generate the footer
    generateJavaScript($pageName);
    // php function to generate the footer
    generateFooter($pageName);
?>