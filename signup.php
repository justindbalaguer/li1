<?php
    require 'header.php';
?>

    <main>
        <div class="container">
            <section class="section-default">
                <h1>Signup</h1>
                <?php
                    if (isset($_GET['error'])) {
                        if ($_GET['error'] == "emptyfields") {
                            echo '<p>Fill in all fields!</p>';
                        }
                        elseif($_GET['error'] == "invalidUsername") {
                            echo '<p>Invalid Username!</p>';
                        }
                        elseif($_GET['error'] == "passwordcheck") {
                            echo '<p>Password don\'t match!</p>';
                        }
                        elseif($_GET['error'] == "usertaken") {
                            echo '<p>Username already taken!</p>';
                        }
                    }
                    else if(isset($_GET['signup'])) {
						if ($_GET['signup'] == "success") {
                        echo '<p>Signup Successful!</p>';							
						}
                    }
                ?>
                 <!--Signup Form-->
          <form class="form-horizontal" action="includes/signup.inc.php" method="post">
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
            <!--Confirm Password-->
            <div class="form-group">
              <label class="control-label col-sm-1" for="pwd">Confirm:</label>
              <div class="col-sm-4"> 
                <input type="password" name="pwd-repeat" class="form-control" id="pwd" placeholder="Confirm password">
              </div>
            </div>
            <div class="form-group"> 
              <div class="col-sm-offset-1 col-sm-10">
                <button type="submit" name="signup-submit" class="btn btn-default">Login</button>
              </div>
            </div>
          </form>
            </section>
        </div>
    </main>

<?php
    require 'footer.php';
?>