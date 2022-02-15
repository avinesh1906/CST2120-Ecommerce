<?php
    // php variables
    $pageName = 'My Orders';
    $folderName = 'profile';

    // include the common.php which contains the php functions
    include('../common/common.php');

    // call the php functions 
    generateHeader($pageName, $folderName);
    generateNavBar($pageName);
    generateLoggedMsg($pageName);
?>
<!-- Order div -->
<div class="order">
    <!-- title -->
    <div class="title">
        My Orders
    </div>
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
<!-- session emai div -->
<div id="sessionEmail" style="display:none"><?php echo $_SESSION['email']; ?></div>
<!-- No Order Yet div -->
<div id="noItem"> No Orders Yet!</div>

<?php
    generateJavaScript($pageName);
    // php function to generate the footer
    generateFooter($pageName);
?>