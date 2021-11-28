<?php

    if(isset($_POST['signup-submit'])) {

        require '../includes/dbh.inc.php';

        $username = $_POST['uid'];
        $email = $_POST['mail'];
        $password = $_POST['pwd'];
        $passwordRepeat = $_POST['pwd-repeat'];

        if(empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
            header("Location: ../includes/signup.php?error=emptyfields&uid=".$username."&email=".$email);
            exit();
        }
        else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){
            header("Location: ../includes/signup.php?error=invalidmail&uid");
            exit();

        }
        else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            header("Location: ../includes/signup.php?error=invalidmail&uid=".$username);
            exit();
        }
        else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
            header("Location: ../includes/signup.php?error=invaliuid&mail=".$email);
            exit();
        }
        else if($password !== $passwordRepeat){
            header("Location: ../includes/signup.php?error=passwordCheck&uid=".$username."&mail=".$email);
            exit();
        }
        else {
            $sql = "SELECT uidUsers FROM users WHERE uidUsers=?";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../includes/signup.php?error=sqlerror1");
                exit();
            } 
            else {
                mysqli_stmt_bind_param($stmt, "s", $username);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $resultCheck = mysqli_stmt_num_rows($stmt);
                if($resultCheck > 0) {
                    header("Location: ../includes/signup.php?error=usertaken&mail=".$email);
                exit();
                }
                else{
                    $sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES (?, ?, ?)";
                    $stmt = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt, $sql)) {
                        header("Location: ../includes/signup.php?error=sqlerror2");
                        exit();
                    }
                    else {
                        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

                        mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
                        mysqli_stmt_execute($stmt);
                        header("Location: ../includes/signup.php?sighnup=success");
                        exit();
                    } 
                }
            }
        }

        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }

    else {
        header("Location: ../includes/signup.php");
        exit();
    }

?>