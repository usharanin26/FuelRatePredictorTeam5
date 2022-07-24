<?php
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
    }elseif(strlen($fullname) > 50){
        $error_message = "Name can't exceed 50 characters";
    } elseif (empty($address1)) {
        $error_message = "Please enter the Address";
    }elseif(strlen($address1) > 100){
        $error_message = "Address1 can't exceed 100 characters";
    }elseif (empty($city)) {
        $error_message = "Please enter the City";
    }elseif(strlen($city) > 100){
        $error_message = "City name can't exceed 100 characters";
    }elseif ($state == "state") {
        $error_message = "Please select the State";
    }elseif (empty($zipcode)) {
        $error_message = "Please enter the ZipCode";
    }elseif( strlen($zipcode) < 5 || strlen($zipcode) > 9){
        $error_message = "Zip Code should range between 5 to 9 characters";
    }
    if ($error_message != "") {
        echo '<script>alert("' . $error_message . '");window.location.href="../profile_management.php";</script>';
        
    } else {
        echo '<script>alert("Profile is Successfully Updated!");window.location.href="../fuel_quote_form.php";</script>';
    }
}
