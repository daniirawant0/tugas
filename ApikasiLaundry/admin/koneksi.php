<?php

$host = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "laundry";

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("koneksi Error". $conn->connect_error);
} 

?>