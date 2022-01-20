<?php
    // php variables
    $pageName = 'Profile';
    $folderName = 'profile';

    // include the common.php which contains the php functions
    include('../common/common.php');

    // call the php functions 
    generateHeader($pageName, $folderName);
    generateNavBar($pageName);
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
            <!-- Full Name -->
            <div class="form_details">
                <label for="fullname" class="form-label"> Fullname: </label>
                <a id="fullname">Avinesh Culloo </a>
            </div>
            <!-- Email -->
            <div class="form_details">
                <label for="email" class="form-label"> Email: </label>
                <a id="email">avineshculloo@gmail.com</a>
            </div>
            <!-- Telephone Number -->
            <div class="form_details">
                <label for="telephone" class="form-label"> Phone Number: </label>
                <a id="telephone">+230 5835200</a>
            </div>
            <!-- Date Of Birth -->
            <div class="form_details">
                <label for="DOB" class="form-label"> Date of Birth: </label>
                <a id="DOB">19-06-01</a>
            </div>
            <!-- Gender-->
            <div class="form_details">
                <label for="gender" class="form-label"> Gender: </label>
                <a id="gender">Male</a>
            </div>
        </div>
        <!-- Address-->
        <div class="address">
            <div class="title">
                Shipping Address
            </div>
            <div class="details">
                9, Rue de bon,
                <br>
                Mahebourg,
                <br>
                Mauritius,
                <br>
                51606.  
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
    // php function to generate the footer
    generateJavaScript($pageName);
    generateFooter($pageName);
?>