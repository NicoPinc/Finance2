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


$sqlQuery = "SELECT c.cash_Timestamp,c.cash_Descr,c.cash_Value, u.usr_Name 
FROM allcash c
INNER JOIN users u ON c.usr_Id = u.usr_Id";
$resultSet = $result = $conn->query($sqlQuery);
?>
<table id="editableTable" class="table table-bordered">
	<thead>
		<tr>
			<th>Date</th>
			<th>Info</th>
			<th>User</th>
			<th>Value</th>													
		</tr>
	</thead>
	<tbody>
		<?php while( $row = $resultSet -> fetch_assoc() ) { ?>
           <tr id="<?php echo $row['cash_Timestamp'] ?>">
           <td><?php echo $row['cash_Timestamp']; ?></td> 
		   <td><?php echo $row['cash_Descr']; ?></td>
		   <td><?php echo $row['usr_Name']; ?></td>
		   <td><?php echo $row['cash_Value']; ?></td> 				   				   				  
		   </tr>
		<?php } ?>
	</tbody>
</table>

<form action="" method="POST" name="RecType">
    <label class="checktext" for="type_Expense">
    <input type="radio" class="radio" id="type_Expense" name="newRECtype"<?php if($RecordTypeRadio == "Expense" ) { ?> checked='checked' <?php } ?> value="Expense" onchange="autoSubmit();" checked/>
    <span>Výdaj</span></label>
    <label class="checktext" for="type_Earning">
    <input type="radio" class="radio" id="type_Earning" name="newRECtype" <?php if($RecordTypeRadio == "Earning" ) { ?> checked='checked' <?php } ?> value="Earnings" onchange="autoSubmit();" />
    <span>Výdělek</span></label>
</form>