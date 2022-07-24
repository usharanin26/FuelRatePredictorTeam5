<?php
session_start();

if (isset($_SESSION['uname'])) {
    include('components/header.php');
?>
    <div class="container">
        <br /></br />
        <a href="backend/logout.php"><img src="images/logout_icon.png" alt="Logout" style="width:52px;height:52px; float: right"></a>
        <a href="profile_management.php"><img src="images/profile_icon.jpg" alt="Profile Page" style="width:52px;height:52px;float: right"></a>
        

        <form name="register" action="backend/process_fuel_quote.php" method="POST">
            <h3> Fuel Quote Form</h3>
            <br />
            <div class="form-group w-75">
                <label for="gallons"><b>Gallons Requested*</b></label>
                <input type="number" class="form-control" name="gallons" placeholder="Enter Number of Gallons" required>
            </div>

            <div class="form-group w-75">
                <label for="delivery_address"><b>Delivery Address</b></label>
                <textarea class="form-control" name="delivery_address" placeholder="Delivery Address" readonly></textarea>
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
                <input type="number" class="form-control" name="price_per_gallon" value=4 readonly />
            </div>
            <div class="form-group w-75">
                <label for="amount_due"><b>Total Amount Due</b></label>
                <input type="number" class="form-control" name="amount_due" placeholder="0.0" readonly />
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