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

      <script type= "text/javascript">

//getting each element of the form that needs to be validated
function checkForm(){
    let name = document.getElementById("name").value;;
    let password = document.getElementById("password").value;
    function validateForm(){
    let IsValid = true;


 
  
//username validation ensuring that user fills in his username and does not create one starting with a digit 
    if (name == "") {
    alert("Username cannot be blank");
    IsValid = false;
    }else if(!(isNaN(name.slice(0, 1)))){
    alert("Username cannot start with a digit");
    IsValid = false;
//checks if the username a new user is entering is already taken
    } else if (Boolean(localStorage.getItem("users_data"))){
    if (GetExistingData("name").includes(name)){
        alert("Username already taken. Please type another username.");
        IsValid = false;
    }
};


//makes sure that the password entered by the user is strong enough
    let password_regex = /^[a-zA-Z0-9!@#$%^&*]{6,16}$/;
    let regex1 = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;

    if (password == "") {
    alert("Password cannot be blank");
    IsValid = false;
    } else if(!(password.match(regex1))){
    alert("Weak password. Password must contain at least one numeric digit,one symbol, one uppercase and one lowercase letter!");
    IsValid = false;
    }

    return IsValid;
}

//creating a general function to get an item in a record
function GetExistingData(field_name){
    // Write program
    let existing_dict = JSON.parse(localStorage.getItem("users_data")),
        existing_data = [],
        keys=Object.keys(existing_dict),
        storage_length = keys.length;

    for (let index=0; index<storage_length;index++){
        value = existing_dict[keys[index]][field_name];
        existing_data.push(value)
    };
    return existing_data;
}

function storeinlocal(){
 // Creating a dictionary of the values
    let my_dict = {"name":name,"password":password};
    let current_dt = new Date().toLocaleString().replace(',',' ');
    let new_dict = {};

    new_dict[current_dt] = my_dict;

    if (!(JSON.parse(localStorage.getItem("users_data")))){
        //converting records and date key to strings
        localStorage.setItem("users_data", JSON.stringify(new_dict));
    }
    else{
        let existing_dict = JSON.parse(localStorage.getItem("users_data"));
        existing_dict[current_dt] = my_dict
        localStorage.setItem("users_data", JSON.stringify(existing_dict));
    };
    
    localStorage.setItem("current_user", name)
    alert("Form submitted successfully! Storing in local storage")
}

if (validateForm()==true){
    storeinlocal();
    // Write code to redirect user to login page
    window.location.href = "login.php";
}else{
    alert("Error! Form not successfully submitted")
}
}
</script> 


         <legend><span class="number">1.</span>Enter your information</legend>
         <label for="name">Full Name:</label><br>
         <input type="text" id="name" name="name">
         
         <br><label for="password">Password:</label><br>
         <input type="password" id="password" name="password">
      
      </fieldset>
      
      <button type="button" onclick = "checkForm()">Login</button>
      
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