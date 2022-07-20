<?php

//connect to database
require "../Database.php";
$db = new DBConnection;

//check if submitted
if (isset($_POST["submit"])) {
    //check for token
    if (isset($_SESSION["token"]) && $_SESSION["token"] = $_POST["csrf_token"]) {
        //check if input is empty
        if (!empty($_POST['Email']) && !empty($_POST['Password'])) {
            
            //create variables
            $Email = $_POST['Email'];
            $Password = $_POST['Password'];
            $Login = $db->LoginProfile($Email, $Password);
            
            //check if user can login
            if ($Login == NULL) {
                $melding = "<p class='c-red'>Email of wachtwoord is incorrect</p>";
            }
            else {
                //session variable  = user unique id
                $_SESSION["UserID"] = $Login["UserID"];
                header("Location: ../index.php");
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

$token = uniqid();
$_SESSION['token'] = $token;

?>