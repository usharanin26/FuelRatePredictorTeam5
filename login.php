<?php include('components/header.php'); ?>
<div class="container">
    <br /></br />
    <form name="register" action="backend/process_login.php" method="POST">
        <h3> Fuel Rate Predictor Login</h3>
        <br />
        <div class="form-group w-75">
            <label for="username"><b>Username*</b></label>
            <input type="text" class="form-control" name="username" placeholder="Enter Username" required>

        </div>
        <div class="form-group w-75">
            <label for="password"><b>Password*</b></label>
            <input type="password" class="form-control" name="password" placeholder="Enter Password" required>
        </div>

        <button type="submit" name="login" class="btn btn-success">Submit</button>
        <div class="container signin">
            <p>New user? <a href="registration.php">Register</a></p>
        </div>
    </form>
</div>
<?php include('components/footer.php'); ?>