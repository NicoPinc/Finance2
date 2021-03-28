<?php
include("./Database/config.php");

$usersSQL = "SELECT * FROM users ORDER BY usr_Id ASC";
$resultsU = $conn->query($usersSQL);
//var_dump($resultsU);
$typeSQl = "SELECT"
?>

<div class="container-fluid">
  <div class="form-row">
    <form action="" method="POST" name="form">
      <div class="form-row">
        <div class="form-group">
          <select class="form-control" name="user" id="">
            <option value="All" selected> All users</option>
            <?php 
              while($row = $resultsU->fetch_assoc()){?>
            <option value="<?php echo $row['usr_Id'] ?>"><?php echo $row['usr_Name'] ?></option>
            <?php }?>
          </select>
        </div>
        <div class="form-group">
          <select class="form-group" name="type" id="">
                
          </select>
        </div>
      </div>
    </form>
  </div>

</div>
