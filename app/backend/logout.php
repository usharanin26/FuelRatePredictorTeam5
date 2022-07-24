<?php
    session_start();

    if (isset($_SESSION['uname'])) {
        session_destroy();
        echo '<script>alert("You are logged out!");window.location.href="../login.php";</script>';
    }
?>