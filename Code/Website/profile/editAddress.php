<?php
    // php variables
    $pageName = 'Address';
    $folderName = 'profile';

    // include the common.php which contains the php functions
    include('../common/common.php');

    // call the php functions 
    generateHeader($pageName, $folderName);
    generateNavBar($pageName);
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
        <!-- Street Name -->
        <div class="form_input">
            <label for="street" class="form-label"> Street Name </label>
            <input autocomplete="off" value="9, Rue de bon" type="text" id="street" >
        </div>
        <!-- Town -->
        <div class="form_input">
            <label for="town" class="form-label"> City/Tomn/Village </label>
            <input autocomplete="off" value="Mahebourg" type="text" id="town" >
        </div>     
        <!-- Country -->
        <div class="form_input">
            <label for="country" class="form-label"> Country </label>
            <input autocomplete="off" value="Mauritius" type="text" id="country">
        </div>
        <!-- zip code -->
        <div class="form_input">
            <label for="zipCode" class="form-label"> Zip Code </label>
            <input autocomplete="off" value="51606" type="text" id="zipCode">
        </div>            
    </div>
    <!-- button class -->
    <div class="btn">
        <button onclick="location.href='./profile.php'"> Cancel</button>
        <button id ="secondBtn"> Save changes</button>
    </div>
</div>
<?php
    // php function to generate the footer
    generateFooter($pageName);
?>