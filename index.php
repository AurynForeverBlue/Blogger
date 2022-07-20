<?php

require "./Backend/Post_verwerk.php";

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
    <link rel="icon" href="./Media/Seo/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="./Media/Seo/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="./Media/Seo/favicon.ico" type="image/x-icon">

    <!-- CSS -->
    <link rel="stylesheet" href="./Css/Home/Home.css">

    <!-- Js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js" defer></script>
    <script src="./Js/BlogPosterbtn.js" defer></script>
</head>

<body>
    <div class="container">
        <?php require "./Components/nav.php"; ?>
    </div>
    <div id="account_box">
        <img <?php echo "src='./Media/Account/pfphoto/background.webp'";
                echo "alt='" . $account[0][2] . " profile picture'" ?>>
        <h1><?php echo $account[0][2]; ?></h1>
        <br>
        <button id="BlogPosterbtn">Post Blog</button>
        <br>
        <h3>Account activity</h3>
        <div class="activity">
            <!-- show activity of user -->
            <p>Nog niet werkend</p>
            <?php for ($i = 0; $i < 10; $i++) { ?>
                <div class="notification">
                    <p><b><a class="Titel" href="">Blueg</a></b> has followed you</p>
                </div>
            <?php } ?>
        </div>
        <table>

        </table>
    </div>
    <div id="contentWrapper">
        <?php for ($i = 0; $i < count($post); $i++) { ?>
            <div class="contentBox">
                <img <?php echo "src='./Media/Post/" . $post[$i][0] . "." . $post[$i][5] . "'";
                        echo "alt='Blog Image shared by" . $db->ShowProfile($post[$i][1])[0][2] . " " . time_elapsed_string($post[$i][4]) . "'"  ?>>
                <div class="contentData">
                    <div class="text">
                        <h2><?php echo "<a href='./Account/Profile.php?u=" . $post[$i][1] . "' class='Titel'>"; ?><?php echo $db->ShowProfile($post[$i][1])[0][2] ?></a></h2> <!-- Username -->
                        <h3><?php echo time_elapsed_string($post[$i][4]) ?></h3> <!-- Date -->
                        <h1><?php echo "<a href='./Blog.php?b=" . $post[$i][0] . "' class='Titel'>"; ?><?php echo $post[$i][2] ?></a></h1> <!-- Titel -->
                        <p><?php echo $post[$i][3] ?></p> <!-- Body -->
                        <p><?php echo "" ?></p> <!-- Views and comments -->
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

    <!-- Post Modal box -->
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <form action="./index.php" autocomplete="off" enctype="multipart/form-data" method="post" class="blogpostform">
                <input type="hidden" name="csrf_token" <?php echo "value='" . $token . "'" ?>>
                <input type="hidden" name="UserID" value="132456798">
                <!-- <input type="hidden" name="MAX_FILE_SIZE" value="30000"> -->


                <br>
                <input type="text" name="Titel" id="" required placeholder="Titel">
                <br>
                <textarea name="Bericht" id="" cols="30" rows="10" required placeholder="Bericht...."></textarea>
                <br>
                <input type="file" name="Media" accept=".jpeg,.png,.jpg" required>
                <br>
                <input type="submit" name="submit" value="Blog" required>
                <?php echo $melding; ?>
            </form>

        </div>

    </div>
</body>

</html>