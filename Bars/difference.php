<?php
$startMonth = date("Y-m-05");
$getend = strtotime('Y-m-d');
$endMonth = date("Y-m-05", strtotime("+1 month, $getend"));

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

$SumNicosql = "SELECT SUM(cash_Value) AS ValSum FROM allcash WHERE usr_Id = '1' AND type_Id = '1' AND cash_Date BETWEEN '" . $startMonth ."' AND '" . $endMonth. "' "; 
 //var_dump($SumNicosql);
$SumNicoresult = $conn->query($SumNicosql);
$Nicorow = mysqli_fetch_assoc($SumNicoresult); 
$Nicosum = $Nicorow['ValSum'];

$SumBertsql = "SELECT SUM(cash_Value) AS ValSum FROM allcash WHERE usr_Id = '2' AND type_Id = '1' AND cash_Date BETWEEN '" . $startMonth ."' AND '" . $endMonth. "' "; 
 
$SumBertresult = $conn->query($SumBertsql);
$Bertrow = mysqli_fetch_assoc($SumBertresult); 
$Bertsum = $Bertrow['ValSum'];

$Sum = $Bertrow['ValSum'] - $Nicorow['ValSum']; 
//echo "<td> <h5>".$Sum."</h5></td>";
if($Sum == 0 ){
  echo "It's even (o˘◡˘o) ";
}elseif($Sum < 0){
    $posSum = $Sum * -1;
    echo "Nico pays ".$posSum."CZK more";
}else{
    $posSum = $Sum * 1;
    echo "Bert pays ".$posSum."CZK more";
}
$conn->close(); 
?>