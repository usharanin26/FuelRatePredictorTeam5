<?php
if (isset($_POST['fuel_submit'])) {
    $gallons = $_POST['gallons'];
    $delivery_address = $_POST['delivery_address'];
    $delivery_date = $_POST['delivery_date'];
    $price_per_gallon = $_POST['price_per_gallon'];
    $amount_due = $_POST['amount_due'];

    $error_message = "";

    if (empty($gallons)) {
        $error_message = "Please enter the number of gallons";
    } elseif (empty($delivery_date)) {
        $error_message = "Please select the delivery date";
    }
    if ($error_message != "") {
        echo '<script>alert("' . $error_message . '");window.location.href="../fuel_quote_form.php";</script>';
    } else {
        echo '<script>alert("Fuel Quote Submitted Successfully!");window.location.href="../fuel_quote_history.php";</script>';
    }
}
