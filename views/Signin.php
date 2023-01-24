<?php
if(isset($_COOKIE['username'])){
    header('location: index.php');
}
include_once('Header.php');
if (isset($_GET['signin']) && $_GET['signin']=='fail'){?>
<div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Failed to login</strong>
</div>
<?php } ?>
<div class="custom-signup-container">
    <form action="../controllers/user/Signin.php" method="POST">
        <h2 class="text-center pb-5">Login</h2>
        
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" class="form-control" name="username" id="username" aria-describedby="usernameHelp" placeholder="Enter Username">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>

