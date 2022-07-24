<?php

namespace App;

use PDOException;

if (empty(session_id()) && !headers_sent()) {
    session_start();
}


class ProcessLogin
{


    # above two variables will later be replaced with the values from DB

    public function processLogin()
    {
        if (isset($_SESSION['uname'])) {
            echo '<script>window.location.href="../fuel_quote_form.php";</script>';
        } else {
            if (isset($_POST['login'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];


                if (empty($username)) {
                    header("Location: ../login.php?emptyfields");
                    return 2;
                } elseif (empty($password)) {
                    header("Location: ../login.php?emptyfields&uid=" . $username);
                    return 3;
                } else {
                    require_once("DBConnect.php");
                    $connect = new DBConnect();
                    $con = $connect->connection();
                    $row_count = $this->checkCorrectUser($username, $password, $con);
                    
                    if ($row_count > 0) {
                        $_SESSION['uname'] = $username;
                        $profile_exists = $this->checkProfileExists($username, $con);
                        
                        if ($profile_exists > 0) {
                            echo '<script>window.location.href="../fuel_quote_form.php";</script>';
                        } else {
                            echo '<script>window.location.href="../profile_management.php";</script>';
                        }
                        return $row_count;
                    } else {
                        echo '<script>alert("Incorrect Username or Password!");window.location.href="../login.php";</script>';
                        return 0;
                    }
                }
            }
        }
    }

    public function checkCorrectUser($username, $password, $con)
    {

        $query = "select * from user where username=? and password=?";

        $stmt = $con->prepare($query);
        try {
            $stmt->execute([$username, sha1($password)]);
            $row_count = $stmt->rowCount();

            return $row_count;
        } catch (PDOException $e) {
            echo '<script>alert("Error in Login!");window.location.href="../login.php";</script>';
        }
    }

    public function checkProfileExists($username, $con)
    {

        $query = "SELECT * FROM profile WHERE id=(select id from user where username = ?);";

        $stmt = $con->prepare($query);
        try {
            $stmt->execute([$username]);
            $row_count = $stmt->rowCount();

            return $row_count;
        } catch (PDOException $e) {
            echo '<script>alert("Error in Login!");window.location.href="../login.php";</script>';
        }
    }
}


$login = new ProcessLogin();
$login->processLogin();
