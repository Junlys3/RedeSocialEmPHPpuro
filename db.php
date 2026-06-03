<?php
$host = "sql201.infinityfree.com";
$username = "if0_42083168";
$password = "1478963Ju";
$dbname = "if0_42083168_balacobase";

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
