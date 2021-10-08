<?php

namespace Model;
use mysqli;

class Content
{
    public $conn;
    private $servername = "mysql";
    private $username = "root";
    private $password = "root";
    private $db="web";
    public function __construct()
    {
        $this->conn =new mysqli($this->servername, $this->username, $this->password,$this->db);
        $this->conn->set_charset("utf8mb4");
        if($this->conn->connect_error){
            echo "Ошибка: " . $this->conn->connect_error;
        }

        return $this->conn;
    }

    public function __destruct()
    {
        $this->conn->close();
    }

    /*public function connect($db)
    {

        $conn=new Content();
        $sql1='CREATE DATABASE IF NOT EXISTS web;';
        // sql to create table

        if ($conn->query($sql1) !== TRUE) {
            echo "Error creating table: " . $conn->error;
        }
        $sql = 'CREATE TABLE IF NOT EXISTS $db (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, text_content VARCHAR(350) NOT NULL)';
        if ($conn->query($sql) !== TRUE) {
            echo "Error creating table: " . $conn->error;
        }
    }*/
}