<?php


namespace App;

use PDO;
use PDOException;

// create connection
class DBConnect
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "fuel_rate_predict";

    public function connection()
    {

        try {

            $con = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);

            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $con;
            
        } catch (PDOException $e) {
            echo "error in connection!" . $e->getMessage();
        }
        
    }


}


