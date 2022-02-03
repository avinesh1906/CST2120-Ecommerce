<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <!-- linking the navbar to page -->
    <?php include ("PHP/common.php");
    navbar();
    ?>
    <link rel="stylesheet"type="text/css" href="./CSS/login.css">
    <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
</head>
<body>

   <form action="login.php" method="post">
   
      <h1>Login</h1>
       <!-- creating the login form -->
      <fieldset>
         <legend><span class="number">1.</span>Enter your information</legend>
         <label for="name">Full Name:</label><br>
         <input type="text" id="name" name="full_name">
         
         <br><label for="mail">Email Address:</label><br>
         <input type="email" id="mail" name="user_email">
         
         <br><label for="password">Password:</label><br>
         <input type="password" id="password" name="user_password">
      
      </fieldset>
      
      
      <button type="submit">Login</button>
   </form>

   <footer class="footer1">
    <!-- linking footer to the other pages -->
   <div class="footer-left">
   <h3>Ti<span>Moris</span></h3>
   <p class="footer-links">
   <a href="index.php">Home</a>
   .
   <a href="login.php">Login</a>
   ·
   <a href="#">About</a>
   ·
   <a href="#">Privacy Policy</a>
   ·
   <a href="#">Faq</a>
   ·
   <a href="#">Contact</a>
   </p>
    <!-- adding details to footer -->
   <p class="footer-company-name">Ti Moris &copy; 2022</p>
   </div>
   
   <div class="footer-center">
   <div>
   <i class="fa fa-map-marker"></i>
   <p><span>Avenue des Palmiers </span> Curepipe,Mauritius</p>
   </div>
   
   <div>
   <i class="fa fa-phone"></i>
   <p>+230 59484598</p>
   </div>
   
   <div>
   <i class="fa fa-envelope"></i>
   <p><a href="SJ983@live.mdx.ac.uk">SJ983@live.mdx.ac.uk</a></p>
   </div>
   
   </div>
   
   <div class="footer-right">
   
   <p class="footer-company-about">
   <span>About the company</span>
   Ecommerce website selling local paintings&amp; 
   </p>
   <div class="footer-icons">
   <a href="#"><i class="fa fa-facebook"></i></a>
   <a href="#"><i class="fa fa-twitter"></i></a>
   <a href="#"><i class="fa fa-linkedin"></i></a>
   <a href="#"><i class="fa fa-github"></i></a>
   
   </div>  
   </footer>
 </body>
</html>