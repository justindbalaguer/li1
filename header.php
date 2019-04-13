<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <title>Quizz App</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <div class="container">
        <h1>Login</h1>
        <?php
          if (isset($_SESSION['uid'])) {
            echo '<!--Logout Form-->
            <div class="container">
            <form class="form-horizontal" action="includes/logout.inc.php" method="post">
              <div class="form-group"> 
                <div class="col-sm-offset-1 col-sm-10">
                  <button type="submit" name="logout-submit" class="btn btn-default">Logout</button>
                </div>
              </div>
            </form>
            </div>
            </div>';
          }
          else {
            echo ' <!--Login Form-->
            <form class="form-horizontal" action="includes/login.inc.php" method="post">
              <div class="form-group">
                <label class="control-label col-sm-1" for="email">Username:</label>
                  <div class="col-sm-4">
                    <input type="text" name="uid" class="form-control" id="username" placeholder="Enter username">
                  </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-1" for="pwd">Password:</label>
                <div class="col-sm-4"> 
                  <input type="password" name="pwd" class="form-control" id="pwd" placeholder="Enter password">
                </div>
              </div>
              <div class="form-group"> 
                <div class="col-sm-offset-1 col-sm-10">
                  <button type="submit" name="login-submit" class="btn btn-default">Login</button>
                </div>
              </div>
            </form>
            <br>
            <!--Signup Form Link-->
            <div class="container">
            <a href="signup.php">Signup</a>
            </div>';
          }
          ?>
         
          
    </header>