<?php

//connect to database
require "../Database.php";
$db = new DBConnection;

//check if logged in
if (!isset($_SESSION["UserID"])) {
    header("Location: ../Account/Login.php");
} else {
    $Search = $_GET["search"];
    $Searchpost = $db->ShowPost($Where = "WHERE `Titel` LIKE '%$Search%' ORDER BY `DateUpload` DESC;");
}

// var_dump($post);