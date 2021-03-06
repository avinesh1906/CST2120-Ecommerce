<?php
    // php variables
    $pageName = 'Password';
    $folderName = 'profile';

    // include the common.php which contains the php functions
    include('../common/common.php');

    // call the php functions 
    generateHeader($pageName, $folderName);
    generateNavBar($pageName);
    generateLoggedMsg($pageName);
?>
<div class="myAccount-title">
    Change Password
    <!-- Title bottom border line -->
    <div id="line"></div>
</div>
<!-- password class -->
<div class="password">
    <div class="form">
        <!-- Current Password -->
        <div class="form_details">
            <label for="current_password" class="form-label"> Current </label>
            <div class="form-input">
                <input autocomplete="off" onkeyup="oldPassword()" type="password" id="current_password" >
            </div>
            <div class="form_error">
                <span id="currentPWD_details"></span>
            </div>      
        </div>
        <!-- New Password -->
        <div class="form_details">
        <label for="new_password" class="form-label"> New </label>
            <div class="form-input">
                <input autocomplete="off" onkeyup="passwordValidation()" type="password" id="new_password">
                <i id="toggleEye" name="new_password" class="fa fa-eye"></i>
            </div>
            <div class="form_error">
                <span id="newPWD_details"></span>
            </div>  
        </div>
        <!-- Confirm New Password -->
        <div class="form_details">
            <label for="confirm_password" class="form-label"> Retype New </label>
            <div class="form-input">
                <input autocomplete="off" onkeyup="confirmPassword()" type="password" id="confirm_password">
            </div>
            <div class="form_error">
                <span id="confirmPWD_details"></span>
            </div>  
        </div>
        <!-- Form text -->
        <div class="form_details">
            <div class="infotext">
                <h5> It's a good idea to use a strong password that you don't use elsewhere. </h5>
            </div>
        </div>

    </div>
    <!-- btn class -->
    <div class="btn">
        <button onclick="location.href='./profile.php'"> Cancel</button>
        <button id="changeBtn" > Change</button>
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