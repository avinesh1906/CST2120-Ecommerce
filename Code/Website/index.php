<?php
    // php variables
    $pageName = 'Home';
    $folderName = 'home';

    // include the common.php which contains the php functions
    include('./common/common.php');

    // call the php functions 
    generateHeader($pageName, $folderName);
    generateNavBar($pageName);
?>

<?php
    // php function to generate the footer
    generateFooter($pageName);
?>