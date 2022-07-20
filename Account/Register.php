<?php

require "../Backend/Register_verwerk.php";

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
    <link rel="stylesheet" href="../Css/Login/Login.css">
    
</head>

<body>
    

    <div class="bubbles">
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
    
        <div class="inlogvoer">
            <form method="post" id="FormBox" action="./Register.php" autocomplete="off">
                <h1>Register</h1>
                <input type="hidden" name="csrf_token" <?php echo "value='$token'" ?>>
                <input type="email" name="Email" class="ml" placeholder="Your email..">
                <input type="date" name="Birthday" class="bd" placeholder="birthday.....">
                <input type="password" name="Password" class="pw" placeholder="Your passwoord..">

                <input type="submit" name="submit" id="submit" value="Register">
                <br>
                <p>Already have a account <br><a href="./Login.php">Login here!</a></p>
                <br>
                <?php echo $melding ?>
            </form>
        </div>

    </div>
</body>

</html>