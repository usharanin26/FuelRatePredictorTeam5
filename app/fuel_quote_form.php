<?php

use App\DBConnect;

use function PHPUnit\Framework\isEmpty;

session_start();

if (isset($_SESSION['uname'])) {
    include('components/header.php');
?>
    <script type=text/javascript>
        function calculate_quote() {
            event.preventDefault();
            gallons = document.getElementById("gallons").value;
            $.ajax({
                url: "backend/PricingModule.php",
                type: "POST",
                data: {
                    gallons: gallons
                },
                success: function(result) {
                    total_amount = result * gallons;
                    alert("Price Per Gallon : " + result + "\nTotal Amount : " + total_amount);
                    document.getElementById("price_per_gallon").value = result;
                    document.getElementById("amount_due").value = total_amount;

                }
            });

        }
    </script>


    <div class="container">
        <br /></br />
        <a href="backend/Logout.php"><img src="images/logout_icon.png" alt="Logout" style="width:52px;height:52px; float: right"></a>
        <a href="profile_management.php"><img src="images/profile_icon.jpg" alt="Profile Page" style="width:52px;height:52px;float: right"></a>


        <form name="register" action="backend/FuelQuoteForm.php" method="POST">
            <h3> Fuel Quote Form</h3>
            <br />
            <div class="form-group w-75">
                <label for="gallons"><b>Gallons Requested*</b></label>
                <input type="number" class="form-control" id="gallons" name="gallons" placeholder="Enter Number of Gallons" required>
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
                    if (!empty($row)) {
                        $address = $row["address1"];
                        echo '<textarea class="form-control" name="delivery_address" readonly>' . $address . '</textarea>';
                    }else{
                        echo '<script>alert("Please fill the profile!");window.location.href="profile_management.php";</script>';
                    }
                } catch (PDOException $e) {
                    echo '<script>alert("Error in Fuel Quote Page!");window.location.href="../login.php";</script>';
                }
                ?>

            </div>

            <div class="form-group w-75">
                <label for="delivery_date"><b>Delivery Date*</b></label>
                <div class="col-sm-6">
                    <div class="input-group date" id="datepicker">
                        <input type="text" class="form-control" id="delivery_date" name="delivery_date" required>
                        <span class="input-group-append">
                            <span class="input-group-text bg-white">
                                <i class="fa fa-calendar"></i>
                            </span>
                        </span>
                    </div>
                </div>
            </div>

            <div class="form-group w-75">
                <label for="price_per_gallon"><b>Suggested Price Per Gallon</b></label>
                <input type="number" class="form-control" id="price_per_gallon" name="price_per_gallon" readonly required />
            </div>
            <div class="form-group w-75">
                <label for="amount_due"><b>Total Amount Due</b></label>
                <input type="number" class="form-control" id="amount_due" name="amount_due" placeholder="0.0" readonly required />
            </div>

            <button name="get_quote" id="get_quote" class="btn btn-info" disabled="disabled" onclick="calculate_quote()">Get Quote</button>
            <button type="submit" name="fuel_submit" class="btn btn-success">Submit</button>
            <a href="fuel_quote_history.php" class="btn btn-primary" style="position: relative; left : 170px;">Fuel Quote History</a>
        </form>
    </div>

<?php
    include('components/footer.php');
} else {
    echo '<script>alert("Please Login!");window.location.href="login.php";</script>';
}

?>

<script type="text/javascript">
    $(function() {
        $('#datepicker').datepicker({
            dateFormat: 'yyyy-MM-dd'
        });
    });

    $('#gallons, #delivery_date').bind('change', function() {

        if ($('#gallons').val() != '' && $('#delivery_date').val() != '') {
            $('#get_quote').attr('disabled', false);
        } else {
            $('#get_quote').attr('disabled', true);
        }
    });
</script>