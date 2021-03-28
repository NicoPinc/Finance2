<script>
function autoSubmit()
{
    var formObject = document.forms['UserForm'];
    formObject.submit();
}
</script>
<div class="container flex-fill">
  <div class="row" style="padding-top: 10px;">
    <div class="col">
    <form action="" method="POST" name="UserForm">
    <label class="checktext" for="User_All">
    <input onclick="autoSubmit();" type="radio" class="radio" id="User_All" name="User" value="All"<?php if((isset($_POST['User']) && $_POST['User'] == 'All')) echo ' checked="checked"'?> checked="checked" />
    <span>Všichni</span></label>
    <label class="checktext" for="User_Nico">
    <input onchange="autoSubmit();" type="radio" class="radio" id="User_Nico" name="User" value="Nico" <?php if(isset($_POST['User']) && $_POST['User'] == 'Nico')  echo ' checked="checked"' ?> />
    <span>Nico</span></label>
    <label class="checktext" for="User_Bert">
    <input onchange="autoSubmit();" type="radio" class="radio" id="User_Bert" name="User" value="Bert" <?php if(isset($_POST['User']) && $_POST['User'] == 'Bert')  echo ' checked="checked"' ?> />
    <span>Bert</span></label>
</form>
    </div>
  </div>
   
  <?php
  $userRadio = $_POST['User'];
 /* if(isset($userRadio)){
    if($userRadio == "All"){
      echo 'all';
    }elseif($userRadio == "Nico"){
      echo "nico";
    }elseif($userRadio =="Bert"){
      echo "bert";
    }else{
      echo "error";
    } 
  }*/

    switch($userRadio){
      case 'All': echo "all";break;
      case 'Nico': echo "nico";break;
      case 'Bert': echo "bert";break;
      default: echo "all";
    }
  
//times code
$startMonth = date("Y-m-1"); //this Month
$getend = strtotime('Y-m-1');
$endMonth = date("Y-m-1", strtotime("+1 month, $getend")); //end of cur Month

$lastM = date("Y-m-1", strtotime("-1 month, $getend")); //start of last month
// sql || N - nico | B - bert || T - this month | l - last month
$sqlNT = "SELECT SUM(cash_Value) AS ValSum,
CASE WHEN type_Id = '1'"
?>


  <div class="row">
    <div class="col card" id="R-nazvy">
      Příjmy
    </div>
  </div>
  <div class="row">
    <div class="col" id="lastMV">
      row 2 col 1
    </div>
    <div class="col" id="thisMV">
      row 2 col 2
    </div>
  </div>
  <div class="row">
    <div class="col card" id="R-nazvy">
      Útraty
    </div>
  </div>
  <div class="row">
    <div class="col" id="lastMV">
      row 4 col 1
    </div>
    <div class="col" id="thisMV">
      row 4 col 2
    </div>
  </div>
  <div class="row">
  <div class="col card" id="R-nazvy">
    Ušetřeno
  </div>
  </div>
  <div class="row">
    <div class="col" id="lastMV">
      row 6 col 1
    </div>
    <div class="col" id="thisMV">
      row 6 col 2
    </div>
  </div>
  <div class="row" id="Month-row" style="margin-top: 15px;">
  <div class="col text-left">
    <i id="lastM"> Last Month </i>
  </div>
  <div class="col text-right">
    <i id="thisM"> This Month </i>
  </div>
  </div>
</div>

<style>
  #lastMV{
    color: grey;
    margin-left: 70px;
  }
  #thisMV{
    margin-right: 70px;
  }
  #R-nazvy{
    /** width: 100%;**/
    font-size: 19px;
    box-shadow: 0 -4px 2px -2px rgb(41 48 66 / 7%);
    margin-bottom: 10px;
    margin-top: 10px;
  }
  #lastM{
    padding-left: 20px;
    color: grey;
    font-size: 18px;
  }
  #ThisM{
    padding-right: 20px;
    color: black;
    font-size: 18px;
  }
</style>