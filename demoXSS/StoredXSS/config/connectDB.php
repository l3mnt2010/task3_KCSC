<?php
$host = "localhost";
$user = "root";
$pass = "";
$db_name = "task3_kcsc";

$conn = new MySQLi($host, $user, $pass, $db_name);
if ($conn->connect_error) {
   die("Error connecting to" . $conn->connect_error);
} else {
   echo "Connecting to thành công:)))";
}