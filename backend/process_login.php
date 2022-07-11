<?php

$uname = "admin";
$pwd = "admin";

# above two variables will later be replaced with the values from DB
session_start();

if (isset($_SESSION['uname'])) {
    echo '<script>window.location.href="../fuel_quote_form.php";</script>';
} else {
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $error_message = "";

        if (empty($username)) {
            $error_message = "Please enter the Username";
        } elseif (empty($password)) {
            $error_message = "Please enter the Password";
        }
        if ($error_message != "") {
            echo '<script>alert("' . $error_message . '");window.location.href="../login.php";</script>';
        } else {
            
            if ($username == $uname) {
                if ($password == $pwd) {
                    $_SESSION['uname'] = $username;
                    echo '<script>window.location.href="../fuel_quote_form.php";</script>';
                } else {
                    echo '<script>alert("Incorrect Password!");window.location.href="../login.php";</script>';
                }
            } else {
                $_SESSION['uname'] = $username;
                echo '<script>window.location.href="../profile_management.php";</script>';
            }
        }
    }
}
