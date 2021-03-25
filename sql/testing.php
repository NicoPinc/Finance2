<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "finance";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$resEx = $conn->query('SELECT SUM(pur_Value) AS ValueEx FROM purchases WHERE usr_Id = 2'); 
$rowEx = $resEx->fetch_assoc(); 
$sumEx = $rowEx['ValueEx'];

$resEarn = $conn->query('SELECT SUM(earn_Value) AS ValueEarn FROM earnings WHERE usr_Id = 2'); 
$rowEarn = $resEarn->fetch_assoc(); 
$sumEarn = $rowEarn['ValueEarn'];

$total = $sumEarn - $sumEx;

echo "your total balance is: " .$total. " Kč";
$conn->close();
?>
