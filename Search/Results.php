<?php require "../Backend/Search_verwerk.php"; ?>
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
    <link rel="stylesheet" href="../Css/Result/Result.css">
</head>
<body>
    <div class="container">
        <?php require "../Components/nav.php"; ?>
    </div>
    <div id="contentWrapper">
        <?php if ($Searchpost != NULL) { ?>
        <h1 class="SectionTitle">Best Results</h1>
        <?php for ($i = 0; $i < count($Searchpost); $i++) { ?>
            <div class="contentBox">
                <img <?php echo "src='../Media/Post/" . $Searchpost[$i][0] . "." . $Searchpost[$i][5] . "'"; echo "alt='Blog Image shared by".$db->ShowProfile($Searchpost[$i][1])[0][2]." ".time_elapsed_string($Searchpost[$i][4])."'"  ?>>
                <div class="contentData">
                    <div class="text">
                        <h2><?php echo "<a href='../Account/Profile.php?u=".$Searchpost[$i][1]."' class='Titel'>"; ?><?php echo $db->ShowProfile($Searchpost[$i][1])[0][2] ?></a></h2> <!-- Username -->
                        <h3><?php echo time_elapsed_string($Searchpost[$i][4]) ?></h3> <!-- Date -->
                        <h1><?php echo "<a href='../Blog.php?b=".$Searchpost[$i][0]."' class='Titel'>"; ?><?php echo $Searchpost[$i][2] ?></a></h1> <!-- Titel -->
                        <p><?php echo $Searchpost[$i][3] ?></p> <!-- Body -->
                        <p><?php echo "" ?></p> <!-- Views and comments -->
                    </div>
                </div>
            </div>
        <?php } } else { ?>
            <h1 class="SectionTitle">No Results!</h1>
        <?php } ?>
    </div>
</body>
</html>