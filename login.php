<?php
require_once("includes/config.php");
require_once("includes/classes/FormSanitizer.php");
require_once("includes/classes/Account.php");
require_once("includes/classes/Constants.php");
$account = new Account($con);

if(isset($_POST["submitButton"]))
{
    $email = FormSanitizer::sanitizeFormEmail($_POST["email"]);
    
    $password = FormSanitizer::sanitizeFormPassword($_POST["password"]);
   

    $success = $account->login($email,$password);
    if($success){
        //Store Session
        $_SESSION["userLoggedIn"] = $email;

        header("Location:index1.php");
    }
}

function sanitizeFormString($inputText){
    $inputText = strip_tags($inputText);
    $inputText = str_replace(" ","",$inputText);
    //$inputText = trim($inputText);
    $inputText = strtolower($inputText);    
    $inputText = ucfirst($inputText);    
    return $inputText;


    }

function getInputValue($name){
    if(isset($_POST[$name])){
        echo $_POST[$name];
    }
}

?>








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to KFLIX</title>
    <link rel = "stylesheet" type ="text/css" href="assets/style/style.css"/>
</head>
<body>
    <div class = "signInContainer">
        <div class="column">
        <div class="header">
        <img src="assets/images/Kflix.png"/>
            <h3><b>
            Sign in
            </b></h3>

            </h3>

            <span>to continue to Kflix</span>
            
        </div>
        <form method="POST">
            
            <?php echo $account->getError(Constants::$loginFailed);?>
            <input type="text" name= "email" placeholder="Email" value="<?php getInputValue("email"); ?>"required>
            
            <input type="password" name= "password" placeholder="Password" required>
           
            <input type="submit" name= "submitButton" value="SUBMIT">

            


        </form>
        <a href="register.php" class="signInMessage"> Need an Account? Sign up here!</a>
        </div>
    </div>
</body>
</html> 