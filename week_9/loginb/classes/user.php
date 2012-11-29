<?php 
require_once("table.php");

class User extends Table
{
    const ENCRYPTION = "sha256";
    protected $tableName = "users";
    protected $autoSanitize = false;
    
    private static $salt = "abNaGh834hYbn7hIOe2jio";
    
    public static function getUserByName($uname)
    {
        $db = self::Build("user");
        $uname = self::sanitize($uname);
        $tempUser = $db->getItem("SELECT * FROM `users` WHERE `username` = '$uname'");
        if($tempUser && !empty($tempUser->id))
        {
            return new User($tempUser);
        }
        return false;
    }
    
    public static function checkLogin($uname, $pass)
    {
        $tempUser = self::getUserByName($uname);
        $encPass = hash(self::ENCRYPTION, self::$salt.$pass);
        if($tempUser->password == $encPass)
        {
            return $tempUser;
        }
        return false;
    }
    
    public function __set($key, $val)
    {
        switch($key)
        {
            case "username":
                $this->data->username = self::sanitize($val);
            break;
            case "password":
                $this->data->password = hash(self::ENCRYPTION, self::$salt.$val);
            break;
            default:
                parent::__set($key, $val);
            break;
        }
    }
}