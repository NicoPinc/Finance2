<?php
include("./Database/config.php");

$usersSQL = "SELECT * FROM users ORDER BY usr_Id ASC";
$resultsU = $conn->query($usersSQL);
//var_dump($resultsU);
$typeSQl = "SELECT"
?>

<div class="container-fluid">
  <div class="row">
  <div class="col-8">
    <form action="" method="POST" name="form">
      <div class="form-row">
        <div class="form-group">
          <select class="form-control" name="user" id="">
            <option value="Všichni Uživatelé" selected> Všichni Uživatelé</option>
            <?php 
              while($row = $resultsU->fetch_assoc()){?>
            <option value="<?php echo $row['usr_Name'] ?>"><?php echo $row['usr_Name'] ?></option>
            <?php }?>
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
          <button type="submit" name="button" class="btn btn-dark">Show</button>
        </div>
      </div>
    </form>
    </div>
    <div class="col-4">
      <div class="card flex-fill w-100" style=" height: 87%; padding-top: 7px; padding-bottom: 7px;">
      <?php
      $user = $_POST['user'];
      $type = $_POST['type'];
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
              <?php echo " " .$user. " - ". $type. " ";?>
            </div>
          </div>
        </div>
        <div <?php if (isset($_POST['button'])) echo 'hidden' ?>>
        <div class="row">
          <div class="col">Zazamy nevybrane</div>
        </div>
        <div class="row">
          <div class="col"><h5> ← </h5></div>
        </div>        
        </div>
        
      </div>
    </div>
  </div>
  <div class="row">
    <div class="card flex-fill w-100">
      <div class="card-body d-flex">

        <table class="table table-sm table-hover" style="padding: 10px;">
          <thead>
            <tr>
              <th scope="col">Datum</th>
              <th scope="col">Pozn.</th>
              <th scope="col">Kategorie</th>
              <th scope="col" <?php if($user != 'Všichni Uživatelé') echo 'hidden' ?> >Kdo</th>
              <th scope="col" <?php if($type == 'Vklady' || $type == 'Úspory') echo 'hidden' ?>>Typ</th>
              <th scope="col"style="text-align: end;">Částka</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <?php
                $sql = "SELECT "
              ?>
            </tr>
          </tbody>
        </table>

      </div>
    </div>
  </div>
</div>