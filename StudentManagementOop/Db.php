<?php


class DB
{

    public $connection;

    public function __construct()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "studentsm";

        $this->connection = new mysqli($servername, $username, $password, $database);

        if ($this->connection->connect_error) {
            die("Error Connection :" . $this->connection->connect_error);
        }
    }



    public function __destruct()
    {
        $this->connection->close();
    }


    public function submit_query($query)
    {
        return $this->connection->query($query);
    }
}
