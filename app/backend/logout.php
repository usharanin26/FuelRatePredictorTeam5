<?php

namespace App;

class Logout{
    public function log_out(){
        if (empty(session_id()) && !headers_sent()) {
            session_start();
        }

    if (isset($_SESSION['uname'])) {
        session_destroy();
        echo '<script>alert("You are logged out!");window.location.href="../login.php";</script>';
        
    }
    return 1;
}


}

$logout = new Logout();
$logout->log_out();
