<?php
    // php variables
    $pageName = 'Address';
    $folderName = 'profile';

    // include the common.php which contains the php functions
    include('../common/common.php');

    // call the php functions 
    generateHeader($pageName, $folderName);
    generateNavBar($pageName);
    generateLoggedMsg($pageName);
?>
<!-- My account title -->
<div class="myAccount-title">
    Edit Shipping Address
    <!-- Title bottom border line -->
    <div id="line"></div>
</div>
<!-- edit address -->
<div class="addressEdit">
    <div class="form">           
    </div>
    <!-- button class -->
    <div class="btn">
        <button onclick="location.href='./profile.php'"> Cancel</button>
        <button id ="saveBtn"> Save changes</button>
    </div>
    <!-- server response -->
    <div id="ServerResponse">

    </div>
</div>
<!-- session email -->
<div id="sessionEmail" style="display:none"><?php echo $_SESSION['email'] ?></div>
<?php
    generateJavaScript($pageName);
    // php function to generate the footer
    generateFooter($pageName);
?>