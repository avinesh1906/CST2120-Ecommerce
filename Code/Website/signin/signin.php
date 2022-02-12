<?php
    // php variables
    $pageName = 'Sign In';
    $folderName = 'sigin';

    // include the common.php which contains the php functions
    include('../common/common.php');

    // call the php functions 
    generateHeader($pageName, $folderName);
    generateNavBar($pageName);
    
    //Remove all session variables
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

    //Find out if session exists
    if( array_key_exists("loggedUser", $_SESSION) ){       
        echo '<script type="text/javascript"> ';
        echo 'let log_btn = document.getElementsByName("Sign In");';
        echo 'log_btn[0].innerText = \'Sign In\';';
        echo '</script>';
    } 

    generateLoggedMsg($pageName);
?>
<!-- Sign In -->
<div class="signIn-title">
    <h1>Already Registered?</h1>
</div>
<!-- Sign In body -->
<div class="signIn-body">
    <!-- Register section -->
    <div class="register">
        <!-- title -->
        <div class="title">
            New Customer
        </div>
        <!-- body -->
        <div class="body">
            By creating an account you will be able to shop 
            faster, be up to date on an order's status, and 
            keep track of the orders you have previously made.
        </div>
        <!-- Register button -->
        <div class="registerBtn">
            <button onclick="location.href='../register/register.php';">Create Account</button>   
        </div>
    </div>
    <!-- Login section -->
    <div class="login">
        <!-- Title -->
        <div class="title">
            Login
        </div>
        <!-- Body -->
        <div class="body">
            If you have an account, please log in.
            <!-- Login form -->
            <section name="login_form">
                <div class="login_form ">
                    <!-- Username -->
                    <div class="fullname">
                        <input autocomplete="off" type="text" class="form-control" id="email" onkeyup="emailValidation()" placeholder="email">
                        <span id="usr_details"></span>
                    </div>
                    <!-- Password -->
                    <div class="password">
                        <input  autocomplete="off" type="password" class="form-control" id="Password" onkeyup="passwordValidation()" placeholder="password" >
                        <span id="pwd_details"></span>
                    </div>
                </div>
                <!-- Login submit button -->
                <div class="login_btn">
                    <button onclick="login()" id="login">Sign In </button>   
                </div>
            <section>
        </div>
    </div>
</div>

<?php
    // php function to generate the footer
    generateJavaScript($pageName);
    generateFooter($pageName);
?>