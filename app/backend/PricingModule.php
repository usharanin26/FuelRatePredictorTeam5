<?php

namespace App;

use PDOException;


if (empty(session_id()) && !headers_sent()) {
    session_start();
}

class PricingModule
{
    public function calculate_suggested_price()
    {

        $current_price = 1.5;
        $location_factor = 0;
        $history_factor = 0;
        $gallons = $_POST['gallons'];
        $gallons_factor = 0;
        $company_profit_factor = 0.1;
        $suggested_price = 0;

        if (isset($_SESSION['uname'])) {
            require_once("DBConnect.php");
            $connect = new DBConnect();
            $con = $connect->connection();

            $state_code = $this->retrieveStateCode($con);

            if ($state_code == 'TX') {
                $location_factor = 0.02;
            } else {
                $location_factor = 0.04;
            }

            $history_exists = $this->checkHistoryExists($con);
            if (!empty($history_exists)) {
                $history_factor = 0.01;
            }

            if ($gallons > 1000) {
                $gallons_factor = 0.02;
            } else {
                $gallons_factor = 0.03;
            }

            $margin = $current_price * ($location_factor - $history_factor + $gallons_factor + $company_profit_factor);
            $suggested_price = $current_price + $margin;
            #echo json_encode(array("suggested_price" => $suggested_price));
            
            echo number_format((float)$suggested_price, 3, '.', '');

            return $suggested_price;

        } else {
            echo 'session is not set';
        }
    }

    public function retrieveStateCode($con)
    {

        $query = "select state_code from profile where id= (select id from user where username=?);";

        $stmt = $con->prepare($query);
        try {
            $stmt->execute([$_SESSION['uname']]);
            $state_code = $stmt->fetch();

            return $state_code["state_code"];
        } catch (PDOException $e) {
            #echo "error in connection!" . $e->getMessage();
            echo '<script>alert("Error in retrieving state code for pricing module!");window.location.href="../login.php";</script>';
        }
    }

    public function checkHistoryExists($con)
    {
        $query = "SELECT * FROM fuel_quote_history WHERE id= (select id from user where username=?);";

        $stmt = $con->prepare($query);
        try {
            $stmt->execute([$_SESSION['uname']]);
            $history_exists = $stmt->fetch();
            return $history_exists;
        } catch (PDOException $e) {
            #echo "error in connection!" . $e->getMessage();
            echo '<script>alert("Error in retrieving state code for pricing module!");window.location.href="../login.php";</script>';
        }
    }
}

$pm_obj = new PricingModule();
$pm_obj->calculate_suggested_price();
