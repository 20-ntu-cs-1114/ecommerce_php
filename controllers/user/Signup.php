<?php
include_once('../../models/User.php');
$user = new User();
$user->email = $_POST['email'];
$user->username = $_POST['username'];
$user->password = $_POST['password'];
if($user->signup()){
    header("location: ../../views/Signup.php?signup=pass");
}else{
    header("location: ../../views/Signup.php?signup=fail");
}
?>