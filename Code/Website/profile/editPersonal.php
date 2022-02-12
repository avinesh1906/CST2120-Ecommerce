<?php
    // php variables
    $pageName = 'Personal Information';
    $folderName = 'profile';

    // include the common.php which contains the php functions
    include('../common/common.php');

    // call the php functions 
    generateHeader($pageName, $folderName);
    generateNavBar($pageName);
    generateLoggedMsg($pageName);
?>
<!-- Personal info title -->
<div class="myAccount-title">
    Edit Personal Information
    <!-- Title bottom border line -->
    <div id="line"></div>
</div>
<div class="personal">
        <div class="form">            
        </div>
        <!-- button class -->
        <div class="btn">
            <button onclick="location.href='./profile.php'"> Cancel</button>
            <button id ="saveBtn"> Save Changes</button>
        </div>
    <div id="ServerResponse">

    </div>
</div>
<div id="sessionEmail" style="display:none"><?php echo $_SESSION['email'] ?></div>
<?php
    generateJavaScript($pageName);
    // php function to generate the footer
    generateFooter($pageName);
?>