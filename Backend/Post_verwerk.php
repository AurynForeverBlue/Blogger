<?php

//connect to database
require "./Database.php";
$db = new DBConnection;

//check if submitted
if (isset($_POST["submit"])) {
    //check for token
    if (isset($_SESSION["token"]) && $_SESSION["token"] = $_POST["csrf_token"] && !empty($_POST['UserID'])) {
        //check if input is empty
        if (!empty($_POST['Titel']) && !empty($_POST['Bericht']) && !empty($_FILES['Media'])) {
            // Create needed variables
            $PostID = RandomID();
            $UserID = $_POST['UserID'];
            $Titel = $_POST['Titel'];
            $Bericht = $_POST['Bericht'];
            $ReadyForUpload = true;
            //var_dump($_FILES);
            
            //create variables to move file to right repository
            $Folder_Source = "./Media/Post/";
            $MediaSource = $_FILES["Media"]["tmp_name"];
            $MediaName = $Folder_Source . basename($_FILES["Media"]["name"]);
            $image_extension = strtolower(pathinfo($MediaName, PATHINFO_EXTENSION));
            $acceptable_extensions = ["png", "jpeg", "jpg", "PNG", "JPEG", "JPG"];

            //full name of file
            $FullMediaName = $PostID . "." . $image_extension;

            // Check if media is possible
            if (in_array($image_extension, $acceptable_extensions)) {
                //Move uploaded file to folder
                $MoveFile = move_uploaded_file($MediaSource, $Folder_Source . $FullMediaName);
                echo $MediaSource;
                //check if file has been moved
                if ($MoveFile) {
                    //Send data to database
                    $db->AddPost($PostID, $UserID, $Titel, $Bericht, $image_extension);
                    $melding = "<p class='c-green'>Posted</p>";
                } else {
                    $melding = "<p class='c-red'>File couldn't be uploaded</p>";
                }
            } else {
                $ReadyForUpload = false;
                echo "<br>" . $image_extension;
                $melding = "<p class='c-red'>Coud not upload file type</p>";
            }
        } else {
            $melding = "<p class='c-red'>Niet alles is ingevuld</p>";
        }
    } else {
        header('Location: https://86900.ict-lab.nl/pjc/Blogger/index.php');
    }
} else {
    $melding = " ";
}

//check if logged in
if (!isset($_SESSION["UserID"])) {
    header("Location: ./Account/Login.php");
} else {
    $UserID = $_SESSION["UserID"];
    $account = $db->ShowProfile($UserID);
    $post = $db->ShowPost($Where = "ORDER BY `DateUpload` DESC");

    $token = uniqid();
    $_SESSION['token'] = $token;
}
