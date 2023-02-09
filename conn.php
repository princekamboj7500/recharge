<?php

$servername = "localhost";
$username = "root";
$password = "";
$databasename = "subscription";

$conn = mysqli_connect($servername, 
  $username, $password, $databasename);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}