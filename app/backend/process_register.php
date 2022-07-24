<?php
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $reenter_password = $_POST['re_enter_password'];
    $error_message = "";

    if (empty($username)) {
        $error_message = "Please enter the Username";
    } elseif (empty($password)) {
        $error_message = "Please enter the Password";
    } elseif (empty($reenter_password)) {
        $error_message = "Please enter the confirm password";
    } elseif ($password != $reenter_password) {
        $error_message = "Please re-enter the correct password";
    }
    if ($error_message != "") {
        echo '<script>alert("' . $error_message . '");window.location.href="../registration.php";</script>';
        
    } else {
        echo '<script>alert("Registration is Successful!");window.location.href="../login.php";</script>';
    }
}
