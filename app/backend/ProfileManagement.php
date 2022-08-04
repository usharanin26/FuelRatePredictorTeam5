<?php

namespace App;

use PDOException;

if (empty(session_id()) && !headers_sent()) {
    session_start();
}

class ProfileManagement
{

    public function processProfile()
    {
        if (isset($_POST['profile_submit'])) {
            $fullname = $_POST['fullname'];
            $address1 = $_POST['address1'];
            $address2 = $_POST['address2'];
            $city = $_POST['city'];
            $state = $_POST['state'];
            $zipcode = $_POST['zipcode'];
            $error_message = "";

            if (empty($fullname)) {
                $error_message = "Please enter the Full Name";
            } elseif (strlen($fullname) > 50) {
                $error_message = "Name can't exceed 50 characters";
            } elseif (empty($address1)) {
                $error_message = "Please enter the Address";
            } elseif (strlen($address1) > 100) {
                $error_message = "Address1 can't exceed 100 characters";
            } elseif (empty($city)) {
                $error_message = "Please enter the City";
            } elseif (strlen($city) > 100) {
                $error_message = "City name can't exceed 100 characters";
            } elseif ($state == "state") {
                $error_message = "Please select the State";
            } elseif (empty($zipcode)) {
                $error_message = "Please enter the ZipCode";
            } elseif (strlen($zipcode) < 5 || strlen($zipcode) > 9) {
                $error_message = "Zip Code should range between 5 to 9 characters";
            }
            if ($error_message != "") {
                echo '<script>alert("' . $error_message . '");window.location.href="../profile_management.php";</script>';
                return 0;
            } else {
                require_once("DBConnect.php");
                $connect = new DBConnect();
                $con = $connect->connection();
                $id = $this->getIdforUser($con);
                $profile_exists = $this->checkProfileExists($con, $id);
                if ($profile_exists > 0) {
                    $this->updateRow($con,$id, $fullname, $address1, $address2, $city, $state, $zipcode);
                } else {
                    $this->insertRow($con,$id, $fullname, $address1, $address2, $city, $state, $zipcode);
                }

                return 1;
            }
        }
    }

    public function insertRow($con,$id, $fullname, $address1, $address2, $city, $state, $zipcode)
    {
        $query = "INSERT INTO profile(id,full_name, address1, address2, city, state_code, zipcode) VALUES (?,?,?,?,?,?,?)";

        $stmt = $con->prepare($query);
        try {

            $stmt->execute([$id, $fullname, $address1, $address2, $city, $state, $zipcode]);
            echo '<script>alert("Profile is Successfully Updated!");window.location.href="../fuel_quote_form.php";</script>';
        } catch (PDOException $e) {
            #echo "error in connection!" . $e->getMessage();
            echo '<script>alert("Error in Profile Update!");window.location.href="../login.php";</script>';
        }
    }

    public function updateRow($con,$id, $fullname, $address1, $address2, $city, $state, $zipcode)
    {
        $query = "update profile set full_name = ?, address1=?, address2=?, city=?, state_code=?, zipcode=? where id=?;";

        $stmt = $con->prepare($query);
        try {

            $stmt->execute([$fullname, $address1, $address2, $city, $state, $zipcode, $id]);
            echo '<script>alert("Profile is Successfully Updated!");window.location.href="../fuel_quote_form.php";</script>';
        } catch (PDOException $e) {
            #echo "error in connection!" . $e->getMessage();
            echo '<script>alert("Error in Profile Update!");window.location.href="../login.php";</script>';
        }
    }

    public function checkProfileExists($con, $id)
    {
        $query = "SELECT * FROM profile WHERE id=?;";

        $stmt = $con->prepare($query);
        try {
            $stmt->execute([$id]);
            $row_count = $stmt->rowCount();

            return $row_count;
        } catch (PDOException $e) {
            echo '<script>alert("Error in Login!");window.location.href="../login.php";</script>';
        }
    }

    public function getIdforUser($con)
    {

        if (isset($_SESSION['uname'])) {
            $query = "select id from user where username=?";

            $stmt = $con->prepare($query);
            try {
                $stmt->execute([$_SESSION['uname']]);
                $id = $stmt->fetch();

                return $id["id"];
            } catch (PDOException $e) {
                echo "error in connection!" . $e->getMessage();
                echo '<script>alert("Error in Profile!");window.location.href="../login.php";</script>';
            }
        }
    }
}

$profile_obj = new ProfileManagement();
$profile_obj->processProfile();
