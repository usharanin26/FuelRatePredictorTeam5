<?php
session_start();

if (isset($_SESSION['uname'])) {
    include('components/header.php');
?>
    <div class="container">
        <br /></br />
        <a href="backend/Logout.php"><img src="images/logout_icon.png" alt="Logout" style="width:52px;height:52px; float: right"></a>
        
        <br/>
        <form name="register" action="backend/ProfileManagement.php" method="POST">
            <h3> Profile</h3>
            <br />
            <div class="form-group w-75">
                <label for="fullname"><b>Full Name*</b></label>
                <input type="text" class="form-control" name="fullname" placeholder="Enter Full Name" maxlength="50" required>
            </div>
            <div class="form-group w-75">
                <label for="address1"><b>Address 1*</b></label>
                <input type="text" class="form-control" name="address1" placeholder="Enter Address Line 1" maxlength="100" required>
            </div>
            <div class="form-group w-75">
                <label for="address2"><b>Address 2</b></label>
                <input type="text" class="form-control" name="address2" placeholder="Enter Address Line 2" maxlength="100">
            </div>
            <div class="form-group w-75">
                <label for="city"><b>City*</b></label>
                <input type="text" class="form-control" name="city" placeholder="Enter City" maxlength="100" required>
            </div>
            <div class="form-group">
                <select class="btn btn-info dropdown-toggle" name="state">
                    <option value="state">State</option>
                    <?php
                    require_once("backend/db.php");
                    $query = "SELECT * FROM state;";

                    $stmt = $con->prepare($query);
                    try {
                        $stmt->execute();
                        $rows = $stmt->fetchAll();
                        foreach( $rows as $row ) {
                            $state_code=$row["state_code"];
                            echo "<option value=$state_code>$state_code</option>";
                        }
            
                        
                    } catch (PDOException $e) {
                        echo '<script>alert("Error in populating drop down values!");';
                    }
                    ?>
                    
                </select>
            </div>
            <div class="form-group w-75">
                <label for="zipcode"><b>Zipcode*</b></label>
                <input type="text" pattern="\d*" class="form-control" name="zipcode" placeholder="Enter Zip Code" minlength="5" maxlength="9">
            </div>
            <button type="submit" name="profile_submit" class="btn btn-success">Update</button>

        </form>
    </div>
<?php
    include('components/footer.php');
} else {
    echo '<script>alert("Please Login!");window.location.href="login.php";</script>';
}

?>