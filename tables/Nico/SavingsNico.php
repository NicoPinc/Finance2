
    <thead>
  <tr>
    <th scope="col">Date</th>
    <th scope="col">info</th>
    <th scope="col">How Much</th>
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
  
$sql = "SELECT c.cash_Id,c.cash_Date,c.cash_Value,c.cash_Descr, c.type_Id,c.usr_Id
FROM allcash c
INNER JOIN users u ON c.usr_Id = u.usr_Id
WHERE c.usr_Id = '1' AND c.type_Id ='4'
ORDER BY c.cash_Date DESC";
$result = $conn->query($sql);
if($result -> num_rows > 0){
while($row = $result -> fetch_assoc()){
  echo "<tr>";
  echo "<td>".$row['cash_Date']."</td>";
  echo "<td>".$row['cash_Descr']."</td>";
  echo "<td>".$row['cash_Value']."</td>";
  echo "</tr>";
}
}else{
echo "No data";
};

$SUMsql = "SELECT SUM(cash_Value) AS ValSum FROM allcash WHERE usr_id = '1' AND type_Id ='4' "; 
$SUMresult = $conn->query($SUMsql);
$row = mysqli_fetch_assoc($SUMresult); 
$sum = $row['ValSum'];

echo "<tr>";
echo "<td> </td>";
echo "<td> </td>";
echo "<td> <h5>".$row['ValSum']."</h5></td>";
echo "</tr>";

$conn->close();
        ?>
    </tbody>
</table>
</body>
</html>
