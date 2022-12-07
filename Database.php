<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class DBConnection
{

    private $username = "db86900";
    private $password = "";
    private $con;

    public function __construct()
    {
        session_start();
        $this->con = new PDO("mysql:host =127.0.0.1; dbname=86900_Blogger", $this->username, $this->password);
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    // Post CRUD
    public function AddPost($PostID, $UserID, $Titel, $Body, $Media = "N.v.T")
    {
        $Add_post_query = "INSERT INTO `Post`(`PostID`, `UserID`, `Titel`, `Body`, `Media`) VALUES (:PostID , :UserID , :Titel , :Body , :Media)";
        $statement = $this->con->prepare($Add_post_query);
        $statement->bindParam(":PostID", $PostID, PDO::PARAM_STR);
        $statement->bindParam(":UserID", $UserID, PDO::PARAM_STR);
        $statement->bindParam(":Titel", $Titel, PDO::PARAM_STR);
        $statement->bindParam(":Body", $Body, PDO::PARAM_STR);
        $statement->bindParam(":Media", $Media, PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetchAll();
    }

    public function ShowPost($Where = "WHERE 1")
    {
        $Get_post_query = "SELECT * FROM `Post` $Where";
        $statement = $this->con->prepare($Get_post_query);
        $statement->execute();
        return $statement->fetchAll();
    }

    public function ChangePost($PostID, $UserID, $Titel, $Body)
    {
        $Update_post_query = "UPDATE `Post` SET `Titel`=:Titel ,`Body`=:Body WHERE `PostID`=:PostID";
        $statement = $this->con->prepare($Update_post_query);
        $statement->bindParam(":PostID", $PostID, PDO::PARAM_STR);
        $statement->bindParam(":UserID", $UserID, PDO::PARAM_STR);
        $statement->bindParam(":Titel", $Titel, PDO::PARAM_STR);
        $statement->bindParam(":Body", $Body, PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetchAll();
    }

    public function DeletePost($PostID)
    {
        $Delete_post_query = "DELETE FROM `Post` WHERE `PostID` =:PostID ";
        $statement = $this->con->prepare($Delete_post_query);
        $statement->bindParam(":PostID", $PostID, PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetchAll();
    }

    // Profile CRUD
    public function AddProfile($UserID, $Email, $Pass, $Birthday)
    {
        $Add_Profile_query = "INSERT INTO `Profile`(`UserID`, `Email`, `Password`, `Birthday`) VALUES (:UserID, :Email, :Password, :Birthday);";
        $statement = $this->con->prepare($Add_Profile_query);
        $statement->bindParam(":UserID", $UserID, PDO::PARAM_STR);
        $statement->bindParam(":Email", $Email, PDO::PARAM_STR);
        $statement->bindParam(":Password", $Pass, PDO::PARAM_STR);
        $statement->bindParam(":Birthday", $Birthday, PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetchAll();
    }

    public function ShowProfile($UserID)
    {
        $Get_Profile_query = "SELECT * FROM `Profile` WHERE `UserID` = :UserID";
        $statement = $this->con->prepare($Get_Profile_query);
        $statement->bindParam(":UserID", $UserID, PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetchAll();
    }

    public function ChangeProfile($UserID, $Email, $Name, $Pass, $Bio, $Website)
    {
        $Update_Profile_query = "UPDATE `Profile` SET `Email`=:Email , `Name`=:Name , `Password`=:Password , `Bio`=:Bio , `Website`=:Website WHERE `UserID` =:UserID";
        $statement = $this->con->prepare($Update_Profile_query);
        $statement->bindParam(":UserID", $UserID, PDO::PARAM_STR);
        $statement->bindParam(":Email", $Email, PDO::PARAM_STR);
        $statement->bindParam(":Name", $Name, PDO::PARAM_STR);
        $statement->bindParam(":Password", $Pass, PDO::PARAM_STR);
        $statement->bindParam(":Bio", $Bio, PDO::PARAM_STR);
        $statement->bindParam(":Website", $Website, PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetchAll();
    }

    public function DeleteProfile($UserID)
    {
        $Delete_Profile_query = "DELETE FROM `Profile` WHERE `UserID` =:UserID ";
        $statement = $this->con->prepare($Delete_Profile_query);
        $statement->bindParam(":UserID", $UserID, PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetchAll();
    }

    public function LoginProfile($Email, $Password)
    {
        $Login_query = "SELECT * FROM `Profile` WHERE `Email` = :Email;";
        $statement = $this->con->prepare($Login_query);
        $statement->bindParam(":Email", $Email, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetchAll();
        if ($result) {
            for ($i = 0; $i < count($result); $i++) {
                if (password_verify($Password, $result[$i]["Password"])) {
                    return $result[$i];
                } else {
                    return false;
                }
            }
        } else {
            return false;
        }
    }

    public function RegisterProfile($Email)
    {
        $Register_Profile_query = "SELECT * FROM `Profile` WHERE `Email`=:Email;";
        $statement = $this->con->prepare($Register_Profile_query);
        $statement->bindParam(":Email", $Email, PDO::PARAM_STR);
        $statement->execute();
        if ($statement->fetchAll() == NULL) {
            return true;
        } else {
            return false;
        }
    }

    // Views CRUD
    public function AddViews($ViewID, $VideoID, $AccountID = "Guest")
    {
        $Get_views_query = "INSERT INTO `Views`(`ViewID`, `VideoID`, `AccountID`) VALUES (:ViewID, :VideoID, :AccountID)";
        $statement = $this->con->prepare($Get_views_query);
        $statement->bindParam(":ViewID", $ViewID, PDO::PARAM_STR);
        $statement->bindParam(":VideoID", $VideoID, PDO::PARAM_STR);
        $statement->bindParam(":AccountID", $AccountID, PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetchAll();
    }


    public function CountViews($VideoID)
    {
        $Get_views_query = "SELECT COUNT(*) FROM `Views` WHERE `VideoID` =:VideoID";
        $statement = $this->con->prepare($Get_views_query);
        $statement->bindParam(":VideoID", $VideoID, PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetchAll();
    }
    
    // Follow CRUD
    public function GetFollowing($UserID)
    {
        $Get_Following_query = "SELECT * FROM `Follow` WHERE `Follower_AccountID` = :UserID";
        $statement = $this->con->prepare($Get_Following_query);
        $statement->bindParam(":UserID", $UserID, PDO::PARAM_STR);
        $statement->execute();
        if ($statement->fetchAll() == NULL) {
            return false;
        } else {
            return $statement->fetchAll();
        }
    }

}

//maakt een Random id aan
function RandomID()
{
    $data = openssl_random_pseudo_bytes(16);

    $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}

//geeft tijdverschil sinds gegeven datetime
function time_elapsed_string($datetime, $full = false)
{
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}
