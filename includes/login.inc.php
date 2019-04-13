<?php
if (isset($_POST['login-submit'])) {
    
    require 'dbh.inc.php'; /*CONNECTION TO DATABASE*/

    $username = $_POST['uid'];
    $password = $_POST['pwd'];

    if (empty($username) || empty($password)) {
        header("Location: ../index.php?error=emptyfields");
        exit();
    }
    else {
        $sql = "SELECT * FROM users WHERE username=?"; /* OR email=?;*/ 
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../index.php?error");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $pwdCheck = password_verify($password, $row['password']);
                if ($pwdCheck == false) {
                    header("Location: ../index.php?error=wrongpassword");
                    exit();
                }
                elseif ($pwdCheck == true) {
                    session_start();
                    /* This will store the data to be called e.g Welcome, +username using $_SESSION */
                    $_SESSION['uid'/*name here doesnt matter*/] = $row['uid'];
                    $_SESSION['username'/*name here doesnt matter*/] = $row['username'];
                    
                    header("Location: ../index.php?login=success");
                    exit();
                }
                else {
                    header("Location: ../index.php?error=wrongpassword");
                    exit();
                }
            }
            else {
                header("Location: ../index.php?error=nouser");
                exit();
            }

        }
    }
}
else {
    header("Location: ../index.php");
    exit();
}