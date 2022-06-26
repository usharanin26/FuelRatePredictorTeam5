<?php include('components/header.php'); ?>
<div class="container">
    <br /></br />
    <form name="register" action="registration.php" method="POST">
        <h3>Fuel Quote History</h3>
        <br />
        <div class="form-group w-75">
            <label for="gallons"><b>Gallons Requested</b></label>
            <input type="number" class="form-control" id="gallons" placeholder="Gallons Requested" readonly>
        </div>

        <div class="form-group w-75">
            <label for="delivery_address"><b>Delivery Address</b></label>
            <textarea class="form-control" id="delivery_address" placeholder="Delivery Address" readonly></textarea>
        </div>

        <div class="form-group w-75">
            <label for="delivery_date"><b>Delivery Date</b></label>
            <div class="form-group">
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control" readonly />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>

        <div class="form-group w-75">
            <label for="price_per_gallon"><b>Suggested Price Per Gallon</b></label>
            <input type="number" class="form-control" id="price_per_gallon" placeholder="0.0" readonly />
        </div>
        <div class="form-group w-75">
            <label for="amount_due"><b>Total Amount Due</b></label>
            <input type="number" class="form-control" id="amount_due" placeholder="0.0" readonly />
        </div>



    </form>
</div>
<script type="text/javascript">
    $(function() {
        $('#datetimepicker1').datetimepicker();
    });
</script>
<?php include('components/footer.php'); ?>