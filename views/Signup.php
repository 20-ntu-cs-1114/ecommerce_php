<?php 
include_once("Header.php");
if (isset($_GET['signup']) && $_GET['signup']=='fail'){?>
  <div class="alert alert-dismissible alert-danger">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Failed to Signup: </strong> Maybe Username or Email is already Exitst. Try Again. 
  </div>
  <?php }else if(isset($_GET['signup']) && $_GET['signup']=='pass'){ ?>
  <div class="alert alert-dismissible alert-success">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Congratulation:  </strong> You are Signed Up Successfully.
  </div>
  <?php } ?>
?>
<div class="custom-signup-container">
    <form action="../controllers/user/Signup.php" method="POST">

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter Username">
          </div>
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" class="form-control" name="username" id="username" aria-describedby="usernameHelp" placeholder="Enter Username">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" required name="password" id="password" placeholder="Enter Password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>
