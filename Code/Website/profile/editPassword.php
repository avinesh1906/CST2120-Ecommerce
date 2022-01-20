<?php
    // php variables
    $pageName = 'Password';
    $folderName = 'profile';

    // include the common.php which contains the php functions
    include('../common/common.php');

    // call the php functions 
    generateHeader($pageName, $folderName);
    generateNavBar($pageName);
?>
<div class="myAccount-title">
    Edit Password
    <!-- Title bottom border line -->
    <div id="line"></div>
</div>
<div class="password">
    <div class="form">
        <!-- Current Password -->
        <div class="form_details">
            <label for="current_password" class="form-label"> Current </label>
            <div class="form-input">
                <input autocomplete="off" type="password" id="current_password" onkeyup="oldPassword()">
            </div>
        </div>
        <!-- New Password -->
        <div class="form_details">
            <label for="new_password" class="form-label"> New </label>
            <div class="form-input">
                <input autocomplete="off" type="password" id="new_password" onkeyup="passwordValidation()">
                <i id="toggleEye" name="new_password" class=" fa fa-eye"></i>
            </div>   
        </div>
        <!-- Confirm New Password -->
        <div class="form_details">
            <label for="confirm_password" class="form-label"> Retype New </label>
            <div class="form-input">
                <input autocomplete="off" type="password" id="confirm_password" onkeyup="confirmPassword()">
            </div>
        </div>
        <!-- Form text -->
        <div class="form_details">
            <h5> It's a good idea to use a strong password that you don't use elsewhere. </h5>
        </div>
    </div>
    <div class="btn">
        <button onclick="location.href='./profile.php'"> Cancel</button>
        <button id="secondBtn" > Change</button>
    </div>
</div> 
<?php
    // php function to generate the footer
    generateJavaScript($pageName);
    generateFooter($pageName);
?>