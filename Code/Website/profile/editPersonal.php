<?php
    // php variables
    $pageName = 'Personal Information';
    $folderName = 'profile';

    // include the common.php which contains the php functions
    include('../common/common.php');

    // call the php functions 
    generateHeader($pageName, $folderName);
    generateNavBar($pageName);
?>
<div class="myAccount-title">
    Edit Personal Information
    <!-- Title bottom border line -->
    <div id="line"></div>
</div>
<div class="personal">
    <div class="form">
        <!-- Full name -->
        <div class="form_input">
            <label for="fullname" class="form-label"> Fullname: </label>
            <input autocomplete="off" value = "Avinesh Culloo" type="text" id="fullname" onkeyup="usernameValidation()">
        </div>
        <!-- Email -->
        <div class="form_input">
            <label for="email" class="form-label"> Email: </label>
            <input autocomplete="off" value= "avineshculloo@gmail.com" type="email" id="email" onkeyup="usernameValidation()">
        </div>
        <!-- Phone Number -->
        <div class="form_input">
            <label for="telephone" class="form-label"> Phone Number:  </label>
            <input autocomplete="off" value = "+230 58352200" type="tel" id="telephone" onkeyup="usernameValidation()">
        </div>
        <!-- Date of Birth -->
        <div class="form_input">
            <label for="dob" class="form-label"> Date of Birth: </label>
            <input autocomplete="off" type="date" id="dob" value="2001-06-01" max="<?php echo date('Y').'-'.date('m').'-'.date('d'); ?>">
        </div>
        <!-- Gender -->
        <div class="form_input">
            <label for="gender" class="form-label"> Gender: </label>
            <select id="gender" style="width: 270px ; height:33px">
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
        </div>               
    </div>
    <div class="btn">
        <button onclick="location.href='./profile.php'"> Cancel</button>
        <button id ="secondBtn"> Save Changes</button>
    </div>
</div>
<?php
    // php function to generate the footer
    generateJavaScript($pageName);
    generateFooter($pageName);
?>