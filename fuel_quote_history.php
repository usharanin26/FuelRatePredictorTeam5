<?php
session_start();

if (isset($_SESSION['uname'])) {
    include('components/header.php');
?>
    <div class="container">
        <br /><br />
        <a href="backend/logout.php"><img src="images/logout_icon.png" alt="Logout" style="width:52px;height:52px; float: right"></a>
        <a href="profile_management.php"><img src="images/profile_icon.jpg" alt="Profile Page" style="width:52px;height:52px;float: right"></a>
        <br/>
        <h3> Fuel Quote History</h3>
        <br />
        
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Gallons Requested</th>
                    <th scope="col">Delivery Address</th>
                    <th scope="col">Delivery Date</th>
                    <th scope="col">Suggested Price Per Gallon</th>
                    <th scope="col">Total Amount Due</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>200</td>
                    <td>2111 HOlly Hall St. Houston, Texas 77054</td>
                    <td>7/6/2022</td>
                    <td>4</td>
                    <td>500</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>100</td>
                    <td>2111 Scotland yard, Houston, Texas 77054</td>
                    <td>4/6/2022</td>
                    <td>4</td>
                    <td>20</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>20</td>
                    <td>45, Stratford, Houston, Texas 77054</td>
                    <td>6/6/2022</td>
                    <td>3.6</td>
                    <td>0</td>
                </tr>
            </tbody>
        </table>
    </div>
<?php
    include('components/footer.php');
} else {
    echo '<script>alert("Please Login!");window.location.href="login.php";</script>';
}

?>