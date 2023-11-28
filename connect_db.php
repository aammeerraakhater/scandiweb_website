<?php
$dbHost = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "scandiweb_products";
$conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
