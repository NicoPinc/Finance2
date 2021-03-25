<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MainPage</title>
    <link rel="stylesheet" type="text/css" href="../css/skeuos.css">
</head>
<body>

    <table style="width:100%">
    <thead>
  <tr>
    <th>Purchase Id</th>
    <th>info</th>
    <th>For </th>
    <th>How Much</th>
  </tr>
    </thead>
    <tbody>
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
  
  $sql = "SELECT c.cash_Id,c.cash_Value,c.cash_Descr, c.type_Id,u.usr_Name
  FROM allcash c
  INNER JOIN users u ON c.usr_Id = u.usr_Id
  WHERE c.type_Id ='3' AND c.usr_Id = 1";
$result = $conn->query($sql);
if($result -> num_rows > 0){
while($row = $result -> fetch_assoc()){
  echo "<tr>";
  echo "<td>".$row['cash_Id']."</td>";
  echo "<td>".$row['cash_Descr']."</td>";
  echo "<td>".$row['usr_Name']."</td>";
  echo "<td>".$row['cash_Value']."</td>";
  echo "</tr>";
}
}else{
echo "No data";
};

$SUMsql = "SELECT SUM(cash_Value) AS ValSum FROM allcash WHERE type_Id ='3' AND usr_Id = '1'"; 
$SUMresult = $conn->query($SUMsql);
$row = mysqli_fetch_assoc($SUMresult); 
$sum = $row['ValSum'];

echo "<tr>";
echo "<td> </td>";
echo "<td> </td>";
echo "<td> </td>";
echo "<td> <h6>".$row['ValSum']."</h6></td>";
echo "</tr>";

$conn->close();
        ?>
    </tbody>
</table>
</body>
</html>
