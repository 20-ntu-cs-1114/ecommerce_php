<?php
include_once('Config.php');
class User
{
    private $id;
    public $username;
    public $email;
    public $password;
    public $role;
    public $created_at;
    public $updated_at;
    private $userTable;
    function __construct()
    {
        $this->userTable = Config::getConnection();
    }

    function signin($username, $password)
    {
        try {
            $query = "SELECT * FROM users WHERE username = ? AND password = ?";
            $sql = $this->userTable->prepare($query);
            $result = $sql->execute([$username, md5($password)]);
            return $sql;
        } catch (PDOException $exception) {
            echo $exception;
        }
    }
    function signup(){
        try {
            $this->created_at = date('Y-m-d H:i:s');
            $this->updated_at = date('Y-m-d H:i:s');
            $query = "INSERT INTO `users` ( `username`, `email`, `password`, `created_at`, `updated_at`) VALUES (?, ?, ?,?, ?);";
            $sql = $this->userTable->prepare($query);
            $result = $sql->execute([$this->username,$this->email,md5($this->password),$this->created_at,$this->updated_at]);
            return $result;
        } catch (PDOException $exception) {
            return false;
        }
    }
    
}

?>