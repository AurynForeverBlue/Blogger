<?php

//connect to database
require "../Database.php";
$db = new DBConnection;

//check if submitted
if (isset($_POST["submit"])) {
    //check for token
    if (isset($_SESSION["token"]) && $_SESSION["token"] = $_POST["csrf_token"]) {
        //check if input is empty
        if (!empty($_POST['Email']) && $_POST['Birthday'] && !empty($_POST['Password'])) {

            //create needed variables
            $UserID = RandomID();
            $Email = $_POST['Email'];
            $Birthday =  $_POST['Birthday'];
            $Password = $_POST['Password'];
            $Password_encrypt = password_hash($Password, PASSWORD_DEFAULT);
            $Register = $db->RegisterProfile($Email);

            //check if valid email
            if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
                $melding = "<p class='c-red'>Verkeerde Email</p>";
            }
            else {
                //!Note!
                //zorg dat een standard pffoto een kopie van zelf maakt
                //gebruiker krijgt deze foto als standaard pffoto 

                //check if register is possible
                if ($Register) {
                    $db->AddProfile($UserID, $Email, $Password_encrypt, $Birthday);
                    $melding = "<p class='c-green'>Account aangemaakt</p>";
                }
                else {
                    $melding = "<p class='c-red'>Email of gebruikersnaam wordt al gebruikt</p>";
                }
            }
            
            
        } 
        else {
            $melding = "<p class='c-red'>Niet alles is ingevuld</p>";
        }
    } 
    else {
        header('Location: https://86900.ict-lab.nl/pjc/Blogger/index.php');
    }
}
else {
    $melding = " ";
}

//check if logged in
if (!isset($_SESSION["UserID"])) {
    header("Location: ../Account/Login.php");
} else {
    $token = uniqid();
    $_SESSION['token'] = $token;
}



?>
