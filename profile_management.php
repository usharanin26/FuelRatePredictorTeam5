<?php include('components/header.php'); ?>
<div class="container">
    <br /></br />
    <form name="register" action="registration.php" method="POST">
        <h3> Profile</h3>
        <br />
        <div class="form-group w-75">
            <label for="fullname"><b>Full Name*</b></label>
            <input type="text" class="form-control" id="fullname" placeholder="Enter Full Name" maxlength="50" required>
        </div>
        <div class="form-group w-75">
            <label for="address1"><b>Address 1*</b></label>
            <input type="text" class="form-control" id="address1" placeholder="Enter Address Line 1" maxlength="100" required>
        </div>
        <div class="form-group w-75">
            <label for="address2"><b>Address 2</b></label>
            <input type="text" class="form-control" id="address1" placeholder="Enter Address Line 2" maxlength="100">
        </div>
        <div class="form-group w-75">
            <label for="city"><b>City*</b></label>
            <input type="text" class="form-control" id="city" placeholder="Enter City" maxlength="100" required>
        </div>
        <div class="form-group">
            <select class="btn btn-info dropdown-toggle" name="state" id="state">
                <option value="volvo">State</option>
                <option value="volvo">TX</option>
                <option value="saab">CN</option>
                <option value="opel">NY</option>
            </select>
        </div>
        <div class="form-group w-75">
            <label for="zipcode"><b>Zipcode*</b></label>
            <input type="text" pattern="\d*" class="form-control" id="zipcode" placeholder="Enter Zip Code" minlength="5" maxlength="9" required>
        </div>
        <button type="submit" class="btn btn-success">Update</button>

    </form>
</div>
<?php include('components/footer.php'); ?>