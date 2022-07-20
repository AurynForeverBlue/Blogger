<?php

//connect to database
require "../Database.php";
$db = new DBConnection;

//check if logged in
if (!isset($_SESSION["UserID"])) {
    header("Location: ../Account/Login.php");
} else {
    $UserID = $_GET["u"];
    $account = $db->ShowProfile($UserID);
}


// if($account == NULL || $UserID != $_SESSION["UserID"]) {
//     header("Location: ../index.php?u=".$_SESSION["UserID"]);
// }
// else {
//     $account = $db->ShowProfile($UserID);
// }