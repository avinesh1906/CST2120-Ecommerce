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
<div class="myAccount-title">
    My Account
    <!-- Title bottom border line -->
    <div id="line"></div>
</div>
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
    </div></div>
<?php
    generateJavaScript($pageName);
    // php function to generate the footer
    generateFooter($pageName);
?>