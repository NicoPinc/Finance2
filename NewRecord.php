<?php
if ( ! empty( $_POST['MainFormButton'] ) ) { /* print_r($_POST); exit */
    $data = array_map( array( $conn, 'real_escape_string'), $_POST);
    
    //convert to var
    extract( $data);

    //submit
if(is_null($cat)){
    $query = "INSERT INTO allcash2 (cash_Value, cash_Date, cat_Id, cash_Desc, type_Id, usr_Id) VALUES ('$amount','$date','9', '$descr', '$type', '$userName')";
}else{
    $query = "INSERT INTO allcash2 (cash_Value, cash_Date, cat_Id, cash_Desc, type_Id, usr_Id) VALUES ('$amount','$date','$cat', '$descr', '$type', '$userName')";
}

    //$query = "INSERT INTO allcash2 (cash_Value, cash_Date, cash_Cat, cash_Desc, type_Id, usr_Id) VALUES ('$amount','$date','$cat', '$descr', '$type', '$userName')";
    //nefunguje vkladani vkladu a sporeni protoze ani jeden nemaji cash category
  //var_dump($query);
  $insert = $conn->query( $query );
}
?>
<script>
function autoSubmit(){
    var formObject = document.forms['RecType'];
    formObject.submit();
}
</script>

<div class="container-fluid">
  <div class="card flex-fill" style=" width: 33%/*fit-content*/; display: -webkit-inline-box; padding: 10 0 25 0; min-width: 33%;">
    <div class="row" >
      <div class="col" id="">
        <form action="" method="POST" name="RecType" id="center">
          <label class="checktext" for="type_Expense">
          <input onclick="autoSubmit();" type="radio" class="radio" id="type_Expense" name="newRECtype" value="Expense"<?php if(isset($_POST['newRECtype']) && $_POST['newRECtype'] == 'Expense') echo ' checked="checked"'?> checked/>
          <span>Výdej     </span></label>
          <label class="checktext" for="type_Earning">
          <input onchange="autoSubmit();" type="radio" class="radio" id="type_Earning" name="newRECtype" value="Earnings" <?php if(isset($_POST['newRECtype']) && $_POST['newRECtype'] == 'Earnings')  echo ' checked="checked"' ?> />
          <span>Vklad     </span></label>
          <label class="checktext" for="type_Saving">
          <input onchange="autoSubmit();" type="radio" class="radio" id="type_Saving" name="newRECtype" value="Saving" <?php if(isset($_POST['newRECtype']) && $_POST['newRECtype'] == 'Saving')  echo ' checked="checked"' ?> />
          <span>Spoření</span></label>
        </form>
      </div>
    </div>
    <div class="row">
      <div class="col">
    <?php
    $radio = $_POST['newRECtype'];

    switch($radio){
        case 'Expense': include "./NewRec/expense.php";break;
        case 'Earnings': include "./NewRec/earning.php";break;
        case 'Saving': include "./NewRec/saving.php";break;
        default: include "./NewRec/expense.php";
      }

    if ( isset( $insert ) ) : ?>
        <div class="Message">
            <?php if( $insert == true ) : ?>
                <p class="SuccMsg">Data successfully inserted</p>
            <?php else : ?>
                <p class="ErrMsg"> There is an Error </p>
                <?php endif; ?>   
        </div>
        <?php endif; ?> 
      </div> 
    </div>
  </div>
</div>
<style>
  #center{
    font-size: 18px;
  box-shadow: 0 5px 5px 0px rgb(41 48 66 / 9%);
  }
</style>