<?php include('components/header.php');?>


<div class="container">
    <br /></br />
    <form name="register" action="backend/ProcessLogin.php" method="POST">
        <h3> Fuel Rate Predictor Login</h3>
        <br />
        <div class="form-group w-75">
            <label for="username"><b>Username*</b></label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Enter Username" required>

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
<?php 
if(isset($_GET['emptyfields'])){
    if(isset($_GET['uid'])){
    echo '<script>alert("Please Enter Password!");document.getElementById("username").value = "'.$_GET['uid'].'";</script>';
    }else{
        echo '<script>alert("Please Enter Username!");</script>';
    }
}
if(isset($_GET['inc_pwd'])){
    echo '<script>alert("Incorrect Password!");document.getElementById("username").value = "'.$_GET['uid'].'";</script>';
}
include('components/footer.php'); ?>