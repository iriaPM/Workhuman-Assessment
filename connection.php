<?php
//settings to connect to the database (xampp phpmyadmin)
//workhuman database, name of the table is countries and the column is country_name
$host = "localhost";
$dbname = "workhuman";
$username = "root";
$password = "";

//create a connection to the database 
$conn = new mysqli($host, $username, $password, $dbname);

//check connection is working
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>