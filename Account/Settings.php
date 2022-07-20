<?php 

require "../Backend/Settings_verwerk.php"; 

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
    <link rel="stylesheet" href="../Css/Settings/Settings.css">
</head>

<body>
    <div class="container">

        <?php require "../Components/nav.php"; ?>

        <div class="fotobk"> </div>
        <div class="kleinpf"> </div>
        <div class="infobox"></div>
        <div class="info">
            <h2><?php echo $account[0][2] ?></h2>
        </div>
        <div class="meerinfo">
            <h3><?php echo $account[0][5] ?></h3>
        </div>
        <hr>
        <div class="post">
            <form <?php echo "action='Profile.php?u=".$_SESSION['UserID']."'"  ?> method="post">
                <div class="inputL">
                    <h1>Profiel</h1>

                    <p><label for="Email">Email:</label></p>
                    <input type="email"> <br> <br>

                    <p><label for="">Birtday:</label></p>
                    <input type="date">
                </div>

                <div class="inputR">
                    <p class="Username"><label for="Username">Username:</label></p>
                    <input type="text"> <br> <br>

                    <p><label for="Bio">Bio:</label></p>
                    <textarea id="w3review" name="w3review" rows="4" cols="50"></textarea>
                </div>
            </form>
        </div>
    </div>
</body>

</html>