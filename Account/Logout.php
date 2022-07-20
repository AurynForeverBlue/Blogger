<?php

//connect to database
require "../Database.php";
$db = new DBConnection;

session_destroy();

header("Location: Login.php");


?>