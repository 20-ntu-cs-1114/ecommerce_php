<?php
setcookie('username', "", time() - 604800,"/");
setcookie('role', "", time() - 604800,"/");
setcookie('user_id', "", time() - 604800,"/");
header('location: ../../views/Signin.php');
?>