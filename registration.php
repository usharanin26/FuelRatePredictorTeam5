<?php include('components/header.php'); ?>
<div class="container">
    <br/></br/>
<form name="register" action="registration.php" method="POST">
    <h3> New User Registration Form</h3>
    <br/>
    <div class="form-group w-75">
        <label for="username"><b>Username*</b></label>
        <input type="text" class="form-control" id="username" placeholder="Enter Username" required>

    </div>
    <div class="form-group w-75">
        <label for="password"><b>Password*</b></label>
        <input type="password" class="form-control" id="password" placeholder="Enter Password" required>
    </div>
    <div class="form-group w-75">
        <label for="password"><b>Re-enter Password*</b></label>
        <input type="password" class="form-control" id="re_enter_password" placeholder="Re-enter Password" required>
    </div>
    <button type="submit" class="btn btn-success">Submit</button>
    <div class="container signin">
                <p>Existing user? <a href="login.php">Login</a></p>
            </div>
</form>
</div>
<?php include('components/footer.php'); ?>