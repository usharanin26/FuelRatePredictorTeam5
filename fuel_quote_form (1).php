<script>
    function populate_amount(){
        gallons=document.getElementById("gallons").value;
        price_per_gallon=document.getElementById("price_per_gallon").value;
        document.getElementById("amount_due").value=gallons*price_per_gallon;

    }
</script>

<?php

use App\DBConnect;

session_start();

if (isset($_SESSION['uname'])) {
    include('components/header.php');
?>
    <div class="container">
        <br /></br />
        <a href="backend/Logout.php"><img src="images/logout_icon.png" alt="Logout" style="width:52px;height:52px; float: right"></a>
        <a href="profile_management.php"><img src="images/profile_icon.jpg" alt="Profile Page" style="width:52px;height:52px;float: right"></a>
        

        <form name="register" action="backend/FuelQuoteForm.php" method="POST">
            <h3> Fuel Quote Form</h3>
            <br />
            <div class="form-group w-75">
                <label for="gallons"><b>Gallons Requested*</b></label>
                <input type="number" class="form-control" id="gallons" name="gallons" onChange = "populate_amount();" placeholder="Enter Number of Gallons" required>
            </div>

            <div class="form-group w-75">
                <label for="delivery_address"><b>Delivery Address</b></label>
                <?php
                    require_once("backend/DBConnect.php");
                    $connect = new DBConnect();
                    $con = $connect->connection();
                    $query = "SELECT * FROM profile WHERE id=(select id from user where username = ?);";

                    $stmt = $con->prepare($query);
                    try {
                        $stmt->execute([$_SESSION['uname']]);
                        $row = $stmt->fetch();
                        $address = $row["address1"];
                        echo '<textarea class="form-control" name="delivery_address" readonly>'.$address.'</textarea>';
                    } catch (PDOException $e) {
                        echo '<script>alert("Error in Login!");window.location.href="../login.php";</script>';
                    }
                ?>
                
            </div>

            <div class="form-group w-75">
                <label for="delivery_date"><b>Delivery Date</b></label>
                <div class="form-group">
                    <div class='input-group date' name='datetimepicker1'>
                        <input type='text' class="form-control" name="delivery_date" />
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
            </div>

            <div class="form-group w-75">
                <label for="price_per_gallon"><b>Suggested Price Per Gallon</b></label>
                <input type="number" class="form-control" id="price_per_gallon" name="price_per_gallon" value=4 readonly />
            </div>
            <div class="form-group w-75">
                <label for="amount_due"><b>Total Amount Due</b></label>
                <input type="number" class="form-control" id="amount_due" name="amount_due" placeholder="0.0" readonly />
            </div>

            <button type="submit" name="fuel_submit" class="btn btn-success">Submit</button>
            <a href="fuel_quote_history.php" class="btn btn-primary" style="float: right;">Fuel Quote History</a>
        </form>
    </div>
    <script type="text/javascript">
        $(function() {
            $('#datetimepicker1').datetimepicker();
        });
    </script>

<?php
    include('components/footer.php');
} else {
    echo '<script>alert("Please Login!");window.location.href="login.php";</script>';
}

?>