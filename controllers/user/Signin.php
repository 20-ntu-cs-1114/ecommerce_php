<?php
include_once('../../models/User.php');
$db = new User();
$user = $db->signin($_POST['username'], $_POST['password'])->fetch(PDO::FETCH_ASSOC);
if($user){
    setcookie('username',$user['username'],time()+604800,'/');
    setcookie('user_role', $user['role'],time()+604800,'/');
    setcookie('user_id', $user['id'], time() + 604800, '/');
    header("location: ../../views");
}else{
    header("location: ../../views/Signin.php?signin=fail");
}