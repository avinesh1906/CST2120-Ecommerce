<?php
    // php variables
    $pageName = 'Profile';
    $folderName = 'profile';

    // include the common.php which contains the php functions
    include('../common/common.php');

    // call the php functions 
    generateHeader($pageName, $folderName);
    generateNavBar($pageName);
    generateLoggedMsg($pageName);
?>
<!-- my account div -->
<div class="myAccount-title">
    My Account
    <!-- Title bottom border line -->
    <div id="line"></div>
</div>
<!-- no logged user -->
<div class="noLoggedUser">
    <!-- message class -->
    <div class="message">
        <!-- header -->
        <div id="header">
            Sign In or Create an Account 
        </div>
        <!-- body -->
        <div id="body"> 
            To access Profile
        </div>
    </div>
    <!-- redirect link -->
    <div class="redirectLink">
        <a href="../register/register.php">Create Account</a>
        <a href="../signin/signin.php">Sign In</a>
    </div>
</div>
<!-- content div -->
<div class="content">
    <div class="persoLayout">
        <div class="personalInformation">
            <div class="title">
                Personal Information
            </div>
            <div class="body">
            </div>
        </div>
        <!-- Address-->
        <div class="address">
            <div class="title">
                Shipping Address
            </div>
            <div class="details"> 
            </div>  
        </div>

    </div>
    <!-- Button to edit profile -->
    <div class="editProfileBtn" id="btnEdit">
        <button onclick="location.href='./editPersonal.php'"> Edit Personal Information</button>
        <button onclick="location.href='./editAddress.php'"> Change Address</button>
        <button onclick="location.href='./editPassword.php'"> Change Password</button>
        <button onclick="location.href='./myOrders.php'" id="myOrders"> My Orders</button>
    </div>
</div>
<!-- session email div -->
<div id="sessionEmail" style="display:none">
<?php
    //Find out if session exists
    if( array_key_exists("loggedUser", $_SESSION) ){   
        echo $_SESSION['email'];
    } else {
        echo 0;
    } 
?>
</div>
<?php
    generateJavaScript($pageName);
    // php function to generate the footer
    generateFooter($pageName);
?>