<?php

//connect to database
require "../Database.php";
$db = new DBConnection;



if (!isset($_SESSION["UserID"])) {
    header("Location: ../Account/Login.php");
} else {
    $UserID = $_GET["u"];
    $account = $db->ShowProfile($UserID);
    $post = $db->ShowPost($Where = "WHERE `UserID` = '$UserID' ORDER BY `DateUpload` DESC");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- SEO -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Welcome to Blogger! A simple way to share your idea's with the world.">
    <title>Blogger | Share your story with the world</title>

    <!-- icon -->
    <link rel="icon" href="../Media/Seo/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="../Media/Seo/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="../Media/Seo/favicon.ico" type="image/x-icon">

    <!-- CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../Css/Profile/Profile.css">
</head>

<body>
    <div class="container">

        <?php require "../Components/nav.php"; ?>

        <div class="fotobk"></div>
        <div class="kleinpf"></div>
        <div class="infobox"></div>
        <div class="info">
            <h2><?php echo $account[0][2] ?></h2>
        </div>
        <div class="meerinfo">
            <h3><?php echo $account[0][5] ?></h3>
        </div>
        <div class="post">
            <div id="contentWrapper">
                <?php if ($post != null) { ?>
                    <h1 class="latest">Latest Post</h1>
                    <?php for ($i = 0; $i < count($post); $i++) { ?>
                        <div class="contentBox">
                            <img <?php echo "src='../Media/Post/" . $post[$i][0] . "." . $post[$i][5] . "'";
                                    echo "alt='Blog Image shared by" . $db->ShowProfile($post[$i][1])[0][2] . " " . time_elapsed_string($post[$i][4]) . "'"  ?>>
                            <div class="contentData">
                                <div class="text">
                                    <h2><?php echo "<a href='../Account/Profile.php?u=" . $post[$i][1] . "' class='Titel'>"; ?><?php echo $db->ShowProfile($post[$i][1])[0][2] ?></a></h2> <!-- Username -->
                                    <h3><?php echo time_elapsed_string($post[$i][4]) ?></h3> <!-- Date -->
                                    <h1><?php echo "<a href='../Blog.php?b=" . $post[$i][0] . "' class='Titel'>"; ?><?php echo $post[$i][2] ?></a></h1> <!-- Titel -->
                                    <p><?php echo $post[$i][3] ?></p> <!-- Body -->
                                    <p><?php echo "" ?></p> <!-- Views and comments -->
                                </div>
                            </div>
                        </div>
                <?php }
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>