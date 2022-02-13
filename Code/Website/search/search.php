<?php
    // php variables
    $pageName = 'Search';
    $folderName = 'search';

    // include the common.php which contains the php functions
    include('../common/common.php');

    // call the php functions 
    generateHeader($pageName, $folderName);
    generateNavBar($pageName);
    generateLoggedMsg($pageName);
?>
<div class="container">
    <div class="eachProduct row row-cols- row-cols-md-2 ">
    </div>
</div>
<?php
    generateJavaScript($pageName);
    // php function to generate the footer
    generateFooter($pageName);
?>