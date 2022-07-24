<?php
namespace App;

use PDOException;

class Register
{
    public function process_register()
    {
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
                return 0;
            } else {
                $this->storeinDB($username, $password);
                return 1;
            }
        }
    }

    public function storeinDB($username, $password)
    {
        $encrypted_pwd = sha1($password);
        require_once("DBConnect.php");
        $connect = new DBConnect();
        $con = $connect->connection();
        $row_count = $this->checkUserExists($username,$con);
        if ($row_count > 0) {
            echo '<script>alert("User already exists! Please login");window.location.href="../login.php";</script>';
        } else {
            $query = "insert into user(username, password) values(?,?);";

            $stmt = $con->prepare($query);
            try {
                $stmt->execute([$username, $encrypted_pwd]);
                echo '<script>alert("Registration is Successful!");window.location.href="../login.php";</script>';
            } catch (PDOException $e) {
                echo '<script>alert("Error in Registration!");window.location.href="../registration.php";</script>';
            }
        }
    }

    public function checkUserExists($username, $con)
    {
        $query = "select * from user where username=?";
        
        $stmt = $con->prepare($query);
        try {
            $stmt->execute([$username]);
            $row_count = $stmt->rowCount();
            return $row_count;
        } catch (PDOException $e) {
           echo '<script>alert("Error in Registration!");window.location.href="../registration.php";</script>';
        }
    }
}

$register = new Register();
$register->process_register();
