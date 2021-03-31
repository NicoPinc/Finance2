== zaznamy filtruji zatim jenom all users a all money ==
<?php
include("./DBconn.php");

$startOfMonth = date("Y-m-01");
$getend = strtotime('Y-m-01');
$endOfMonth = date("Y-m-01", strtotime("+1 month, $getend"));

?>

<div class="container-fluid">
  <div class="row">
  <div class="col-8">
    <form action="" method="POST" name="form">
      <div class="form-row">
        <div class="form-group">
          <select class="form-control" name="user" id="">
            <option value="Všichni Uživatelé" selected> Všichni Uživatelé</option>
            <option value="Nico" > Nico</option>
            <option value="Bert" > Bert</option>
          </select>
        </div>
        <div class="form-group">
          <select class="form-control" name="type" id="">
            <option value="Všechny Peníze" selected>Všechny Peníze</option>
            <option value="Výdaje">Expenses</option>
            <option value="Vklady">Earnings</option>
            <option value="Úspory">Savings</option>                
          </select>
        </div>
        <div class="form-group">
          <select class="form-control" name="date" id="">
            <option value="Za celé období" selected>Za celé období</option>
            <option value="Poslední měsíc">Poslední měsíc</option>              
          </select>
        </div>
        <div class="form-group">
          <button type="submit" name="button" class="btn btn-dark">Show</button>
        </div>
      </div>
    </form>
    </div>
    <!-- tabulka kde je napsane co je fit -->
    <div class="col-4">
      <div class="card flex-fill w-100" style=" height: 87%; padding-top: 7px; padding-bottom: 7px;">
      <?php
      $user = $_POST['user'];
      $type = $_POST['type'];
      $time = $_POST['date'];
      /**
      if(isset($_POST['button'])) {
        echo "<p> Zobrazuji data : ". $user .  " - " . $type . "</p>";
      }else{
        echo "<p> ← Vyber záznam</p>";
      } 
      */
      ?>
        <div <?php if (!isset($_POST['button'])) echo 'hidden' ?>>
          <div class="row">
            <div class="col">Filtruji zaznamy dle</div>
          </div>
          <div class="row">
            <div class="col">
              <?php echo " " .$user. " - ". $type. " - " .$time;?>
            </div>
          </div>
        </div>
        <div <?php if (isset($_POST['button'])) echo 'hidden' ?>>
        <div class="row">
          <div class="col">Není vybrán žádný filter</div>
        </div>
        <div class="row">
          <div class="col"><h5> ←</h5></div>
        </div>        
        </div>
        
      </div>
    </div>
  </div>
  <div <?php if (!isset($_POST['button'])) echo 'hidden' ?>>
  <div class="row" >
    <div class="card flex-fill w-100">
      <div class="card-body d-flex" >

        <table id="editable_table" class="table table-sm table-hover" style="padding: 10px;" >
          <thead>
            <tr>
              <th scope="col">Datum</th>
              <th scope="col">ID</th>
              <th scope="col" style="padding-left: 10%;">Pozn.</th>
              <th scope="col">Kategorie</th>
              <th scope="col" <?php if($user != 'Všichni Uživatelé') echo 'hidden' ?> >Kdo</th>
              <th scope="col" style="padding-left: 3%;" <?php if($type == 'Vklady' || $type == 'Úspory') echo 'hidden' ?>>Typ</th>
              <th scope="col"style="text-align: end;">Částka</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <?php
                $sql = "SELECT * FROM allcash2 c
                  RIGHT JOIN purchase_type pt ON c.type_Id = pt.type_Id
                  RIGHT JOIN pur_cat cat ON c.cat_Id = cat.cat_Id
                  INNER JOIN users u ON c.usr_Id = u.usr_Id";
                if($time == "Poslední měsíc"){
                  $sql .= " WHERE c.cash_Date BETWEEN '" . $startOfMonth ."' AND '" . $endOfMonth. "'  ORDER BY cash_Date DESC";
                }elseif(){
                  
                }else{
                $sql .= " ORDER BY cash_Date DESC";
                }
                $res = $conn->query($sql);

                if($res->num_rows > 0){
                  while ($row= $res->fetch_assoc()){
                    if($user != 'Všichni Uživatelé' && $type == 'Výdaje'){
                      echo "<tr>";
                      echo "<td>" . $row['cash_Date'] . "</td>";
                      echo "<td>" . $row['cash_Id'] . "</td>";
                      echo "<td style='padding-left: 10%;'>" . $row['cash_Desc'] . "</td>";
                      echo "<td>" . $row['cat_Name'] . "</td>";
                      echo "<td style='padding-left: 3%;' >" . $row['type_Name'] . "</td>";
                      echo "<td style='text-align: end;'>" . $row['cash_Value'] . "</td>";
                      echo "</tr>";
                    }elseif($user != 'Všichni Uživatelé' && $type == 'Všechny Peníze'){
                      echo "<tr>";
                      echo "<td>" . $row['cash_Date'] . "</td>";
                      echo "<td>" . $row['cash_Id'] . "</td>";
                      echo "<td style='padding-left: 10%;'>" . $row['cash_Desc'] . "</td>";
                      echo "<td>" . $row['cat_Name'] . "</td>";
                      echo "<td style='padding-left: 3%;' >" . $row['type_Name'] . "</td>";
                      echo "<td style='text-align: end;'>" . $row['cash_Value'] . "</td>";
                      echo "</tr>";
                    }elseif($user != 'Všichni Uživatelé' && $type == 'Vklady' || $type == 'Úspory'){
                      echo "<tr>";
                      echo "<td>" . $row['cash_Date'] . "</td>";
                      echo "<td>" . $row['cash_Id'] . "</td>";
                      echo "<td style='padding-left: 10%;'>" . $row['cash_Desc'] . "</td>";
                      echo "<td>" . $row['cat_Name'] . "</td>";
                      echo "<td style='text-align: end;'>" . $row['cash_Value'] . "</td>";
                      echo "</tr>";
                    }else{
                      echo "<tr>";
                      echo "<td>" . $row['cash_Date'] . "</td>";
                      echo "<td>" . $row['cash_Id'] . "</td>";
                      echo "<td style='padding-left: 10%;'>" . $row['cash_Desc'] . "</td>";
                      echo "<td>" . $row['cat_Name'] . "</td>";
                      echo "<td>" . $row['usr_Name'] . "</td>";
                      echo "<td style='padding-left: 3%;' >" . $row['type_Name'] . "</td>";
                      echo "<td style='text-align: end;'>" . $row['cash_Value'] . "</td>";
                      echo "</tr>";  
                  }}
                  }else{
                    echo "No data fetched";
                }
              ?>
            </tr>
          </tbody>
        </table>

      </div>
    </div>
  </div>
</div>
  <div <?php if (isset($_POST['button'])) echo 'hidden' ?>>
  <div class="row">
    <div class="card flex-fill w-100">
      Hello
    </div>
  </div>
</div>

</div>

<script>  
$(document).ready(function(){  
    $('#editable_table').Tabledit({
      url:'action.php',
      columns:{
      identifier:[0, "id"],
      editable: [6, "cash_Value"],
      },
      editButton: false,
      restoreButton: false,
      buttons: {
          delete: {
              class: 'btn btn-sm btn-danger',
              html: '<span class="glyphicon glyphicon-trash"></span> &nbsp DELETE',
              action: 'delete'
          },
          confirm: {
              class: 'btn btn-sm btn-default',
              html: 'Are you sure?'
          }
      },
      onSuccess:function(data, textStatus, jqXHR)
      {
      if(data.action == 'delete')
      {
        $('#'+data.id).remove();
      }
      }
    });
});  
</script>
