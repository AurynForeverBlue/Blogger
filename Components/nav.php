<!DOCTYPE html>
<html lang="en">

<head></head>

<body>
    <div class="navbar">
        <form action="https://86900.ict-lab.nl/pjc/Blogger/Search/Results.php" method="get">
            <input class="boveninput" placeholder="Search..." name="search" type="text">
        </form>
        
        <div class="search-container">
            <!-- <a  class="active" href="#"><i class="fa fa-fw fa-user"></i></a> -->
            <ul>
                <li style="float: right; " class="dropdown">
                    <a href="javascript:void(0)" class="dropbtn"><i class="fa fa-fw fa-user"></i>profiel</a>
                    <div class="dropdown-content">
                        <a href="https://86900.ict-lab.nl/pjc/Blogger/index.php">Home</a>
                        <a <?php echo "href='https://86900.ict-lab.nl/pjc/Blogger/Account/Profile.php?u=".$_SESSION["UserID"]."'" ?>>Account</a>
                        <a <?php echo "href='https://86900.ict-lab.nl/pjc/Blogger/Account/Settings.php?u=".$_SESSION["UserID"]."'" ?>>Settings</a>
                        <a href="https://86900.ict-lab.nl/pjc/Blogger/Account/Logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</body>

</html>