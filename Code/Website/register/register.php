<?php
    // php variables
    $pageName = 'Register';
    $folderName = 'register';

    // include the common.php which contains the php functions
    include('../common/common.php');

    // call the php functions 
    generateHeader($pageName, $folderName);
    generateNavBar($pageName);
?>
<!-- Title -->
<div class="register-title">
    Create Account
</div>
<!-- Input form -->
    <div class="form-layout" >
        <!-- Form Input Label and input -->
        <div class="form-content">
            <!-- Full Name -->
            <div class="form_details">
                <div class="form_input">
                    <label for="fullname" class="form-label"> Fullname </label>
                    <input autocomplete="off" type="text" id="fullname" onkeyup="usernameValidation()">
                </div>
                <div class="form_error">
                    <span id="usr_details"></span>
                </div>
            </div>
            <!-- Email -->
            <div class="form_details">
                <div class="form_input">
                    <label for="email" class="form-label"> Email </label>
                    <input autocomplete="off" type="email" id="email" onkeyup="emailValidation()">
                </div>
                <div class="form_error">
                    <span id="email_details"></span>
                </div>
            </div>
            <!-- Date of Birth -->
            <div class="form_details">
                <div class="form_input">
                    <label for="dob" class="form-label"> Date of Birth </label>
                    <input autocomplete="off" type="date" id="dob" value="<?php echo date("Y-m-d"); ?>" max="<?php echo date('Y').'-'.date('m').'-'.date('d'); ?>">
                </div>
            </div>
            <!-- Gender -->
            <div class="form_details">
                <div class="form_input">
                    <label for="gender" class="form-label"> Gender </label>
                    <select id="gender" style="width:60%; height:33px">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </div>               
            </div>
            <!-- Address -->
            <div class="form_details">
                <div class="form_input">
                    <label for="address" class="form-label"> Address </label>
                    <input autocomplete="off" type="text" id="address" onkeyup="addressValidation()">
                </div>
                <div class="form_error">
                    <span id="text_details"></span>
                </div>
            </div>
                <!-- Telephone Number -->
            <div class="form_details">
                <div class="form_input">
                    <label for="telephone" class="form-label"> Telephone </label>
                    <input autocomplete="off" type="tel" id="telephone" onkeyup="telephoneValidation()">
                </div>
                <div class="form_error">
                    <span id="text_details"></span>
                </div>
            </div>
            <!-- Password -->
            <div class="form_details">
                <div class="form_input">
                    <label for="password" class="form-label"> Password </label>
                    <input autocomplete="off" type="password" id="password" onkeyup="passwordValidation()" >
                    <i id="toggleEye" name="password" class=" fa fa-eye"></i>
                </div>
                <div class="form_error">
                    <span id="pwd_details"></span>
                </div>                
            </div>
            <!-- Confirm Password -->
            <div class="form_details">
                <div class="form_input">
                    <label for="confirm_password" class="form-label"> Confirm Password </label>
                    <input autocomplete="off" type="password" id="confirm_password" onkeyup="confirmPassword()">
                </div>
                <div class="form_error">
                    <span id="confirmPWD_details"></span>
                </div>                
            </div>
        </div>
        <!-- Form Footer Container -->
        <div class="register_footer">
            <!-- Submit Button -->
            <button type="submit" id="submit_btn">Create</button>
            <!-- Login Instead Link -->
            <a href="../signin/signin.php">Login Instead?</a>
        </div>

<?php
    // php function to generate the footer
    generateJavaScript($pageName);
    generateFooter($pageName);
?>