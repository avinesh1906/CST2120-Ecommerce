<?php
    // php variables
    $pageName = 'Confirmation';
    $folderName = 'cart';

    // include the common.php which contains the php functions
    include('../common/common.php');

    // call the php functions 
    generateHeader($pageName, $folderName);
    generateNavBar($pageName);
    generateLoggedMsg($pageName);
?>
<div class="afterPurchase" id="afterPurchase">
    <?php

    if(! array_key_exists("loggedUser", $_SESSION) ){
        session_unset(); 
        // If it's desired to kill the session, also delete the session cookie.
        // Note: This will destroy the session, and not just the session data!
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        //Destroy the session 
        session_destroy();
    } else {
        session_regenerate_id();
    }
    ?>
    
    <div class="title">
        THANK YOU 
    </div>
    <div class="body">
        for shopping with TiMoris    
    </div>
    <div class="footer">
        <a href="../index.php">Return to Home</a>
    </div>
</div>
<?php
    generateFooter($pageName);
?>