<?php

class DB
{

    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "vpanel";

    public function connect()
    {
        $conn = mysqli_connect($this->host, $this->username, $this->password, $this->dbname);

        if ($conn) {
            return $conn; // Connection successful, return the connection object
        } else {
            return null; // Connection failed, return null
        }
    }
}
