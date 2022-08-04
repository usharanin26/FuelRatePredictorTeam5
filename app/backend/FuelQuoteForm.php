<?php

namespace App;

use PDOException;

if (empty(session_id()) && !headers_sent()) {
    session_start();
}
class FuelQuoteForm
{

    public function process_fuel_quote_form()
    {
        if (isset($_POST['fuel_submit'])) {
            $gallons = $_POST['gallons'];
            $delivery_address = $_POST['delivery_address'];
            $delivery_date = $_POST['delivery_date'];
            $price_per_gallon = $_POST['price_per_gallon'];
            $amount_due = $_POST['amount_due'];

            $error_message = "";

            if (empty($gallons)) {
                $error_message = "Please enter the number of gallons";
                return 0;
            } elseif (empty($delivery_date)) {
                $error_message = "Please select the delivery date";
                return -1;
            }
            if ($error_message != "") {
                echo '<script>alert("' . $error_message . '");window.location.href="../fuel_quote_form.php";</script>';
            } else {
                $delivery_date = date_format(date_create_from_format('m/d/Y', $delivery_date), 'Y-m-d');
                $this->storeFuelQuote($gallons, $delivery_address, $delivery_date, $price_per_gallon, $amount_due);
                echo '<script>alert("Fuel Quote Submitted Successfully!");window.location.href="../fuel_quote_history.php";</script>';
                return 1;
            }
        }
    }

    public function storeFuelQuote($gallons, $delivery_address, $delivery_date, $price_per_gallon, $amount_due)
    {
        require_once("DBConnect.php");
        $connect = new DBConnect();
        $con = $connect->connection();
        $id = $this->getIdforUser($con);
        $query = "INSERT INTO `fuel_quote_history`(`id`, `gallons`, `delivery_address`, `delivery_date`, `price_per_gallon`, `total_amount`) values(?,?,?,?,?,?);";

        $stmt = $con->prepare($query);
        try {
            $stmt->execute([$id, $gallons, $delivery_address, $delivery_date, $price_per_gallon, $amount_due]);
        } catch (PDOException $e) {
            echo '<script>alert("Error in Fuel Quote!");window.location.href="../login.php";</script>';
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
                #echo "error in connection!" . $e->getMessage();
                echo '<script>alert("Error in Fuel Quote Form!");window.location.href="../login.php";</script>';
            }
        }
    }
}

$fuel_quote_obj = new FuelQuoteForm();
$fuel_quote_obj->process_fuel_quote_form();
