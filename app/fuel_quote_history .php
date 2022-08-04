<?php

use App\DBConnect;

session_start();

if (isset($_SESSION['uname'])) {
    include('components/header.php');
?>
    <div class="container">
        <br /><br />
        <a href="backend/Logout.php"><img src="images/logout_icon.png" alt="Logout" style="width:52px;height:52px; float: right"></a>
        <a href="profile_management.php"><img src="images/profile_icon.jpg" alt="Profile Page" style="width:52px;height:52px;float: right"></a>
        <br />
        <h3> Fuel Quote History</h3>
        <br />

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Gallons Requested</th>
                    <th scope="col">Delivery Address</th>
                    <th scope="col">Delivery Date</th>
                    <th scope="col">Suggested Price Per Gallon ($)</th>
                    <th scope="col">Total Amount Due</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once("backend/DBConnect.php");
                $connect = new DBConnect();
                $con = $connect->connection();
                $query = "select * from fuel_quote_history where id = (select id from user where username = ?);";

                $stmt = $con->prepare($query);
                try {
                    $stmt->execute([$_SESSION['uname']]);
                    $rows = $stmt->fetchAll();
                    $index = 1;
                    foreach ($rows as $row) {
                        echo '<tr>
                            <th scope="row">' . $index++ . '</th>
                            <td>' . $row["gallons"] . '</td>
                            <td>' . $row["delivery_address"] . '</td>
                            <td>' . $row["delivery_date"] . '</td>
                            <td>' . $row["price_per_gallon"] . '</td>
                            <td>' . $row["total_amount"] . '</td>
                        </tr>';
                    }
                } catch (PDOException $e) {
                    #echo "error in connection!" . $e->getMessage();
                    echo '<script>alert("Error in Fuel Quote History!");window.location.href="../login.php";</script>';
                }

                ?>

            </tbody>
        </table>
    </div>
<?php
    include('components/footer.php');
} else {
    echo '<script>alert("Please Login!");window.location.href="login.php";</script>';
}

?>