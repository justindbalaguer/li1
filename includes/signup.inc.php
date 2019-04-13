<?php
if (isset($_POST['signup-submit'])) {
    
    require 'dbh.inc.php'; /*CONNECTION TO DATABASE*/

    $username = $_POST['uid'];
    /* $email = $_POST['email']; */
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-repeat'];

    if (empty($username) ||empty($password) || empty($passwordRepeat)) {
        header("Location: ../signup.php?error=emptyfields&uid=".$username."&pwd=".$password); /* Sends url message error */
        exit(); /* Stops the code from running below if user didnt complete form */
    }
    /* elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) && (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../signup.php?error=emptyfields&username=".$username); /* Sends url message error */
       /* exit();  Stops the code from running below if user didnt complete form 
    }*/
    /* elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../signup.php?error=emptyfields&username=".$username); /* Sends url message error */
       /* exit();  Stops the code from running below if user didnt complete form 
    }*/
    elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) { /* Search symbols for username */
        header("Location: ../signup.php?error=invalidUsername"); /* Sends url message error */ 
        exit();
    }
    elseif ($password !== $passwordRepeat) {
        header("Location: ../signup.php?error=passwordcheck&uid=".$username);
        exit();
    }
    else {
        /*check if match username*/
        $sql = "SELECT username FROM users WHERE username=?"; /* '?' is used as a placeholder */
        $stmt = mysqli_stmt_init($conn); /*statement (stmt) initialize (init)*/
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../signup.php?error");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "s", $username); /* String = s, Integer = i, Blob = b, Double = d  NOTE: if '?' only 1 then 's' only 1 else 'ss', $something, $something2*/
            mysqli_stmt_execute($stmt); /* running in database */
            mysqli_stmt_store_result($stmt); /*fetch info from db and store*/
            $resultCheck = mysqli_stmt_num_rows($stmt); /*number of result*/
            if ($resultCheck > 0) { /* if result match same username  then*/
                header("Location: ../signup.php?error=usertaken");
                exit();
            }
            else {
                $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../signup.php?error");
                    exit();
                }
                else {
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "ss", $username, $hashedPwd); /* String = s, Integer = i, Blob = b, Double = d  NOTE: if '?' only 1 then 's' only 1 else 'ss', $something, $something2*/
                    mysqli_stmt_execute($stmt); /* running in database */
                    header("Location: ../signup.php?signup=success");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
else {
    header("Location: ../signup.php");
    exit();
}