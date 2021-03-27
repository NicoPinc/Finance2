<?php

if ( ! empty( $_POST['MainFormButton'] ) ) { /* print_r($_POST); exit */
    $conn = new mysqli("127.0.0.1","root", "", "finance");
    $data = array_map( array( $conn, 'real_escape_string'), $_POST);
    
    //convert to var
    extract( $data);

    //submit
if(is_null($cat)){
    $query = "INSERT INTO allcash2 (cash_Value, cash_Date, cash_Cat, cash_Desc, type_Id, usr_Id) VALUES ('$amount','$date',NULL, '$descr', '$type', '$userName')";
}else{
    $query = "INSERT INTO allcash2 (cash_Value, cash_Date, cash_Cat, cash_Desc, type_Id, usr_Id) VALUES ('$amount','$date','$cat', '$descr', '$type', '$userName')";
}

    //$query = "INSERT INTO allcash2 (cash_Value, cash_Date, cash_Cat, cash_Desc, type_Id, usr_Id) VALUES ('$amount','$date','$cat', '$descr', '$type', '$userName')";
    //nefunguje vkladani vkladu a sporeni protoze ani jeden nemaji cash category
   var_dump($query);
  $insert = $conn->query( $query );
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

    <script>
function autoSubmit()
{
    var formObject = document.forms['RecType'];
    formObject.submit();
}
</script>
<div class="card " style=" width: 33%/*fit-content*/; display: -webkit-inline-box; padding: 25px; min-width: 33%;">
<form action="" method="POST" name="RecType">
    <label class="checktext" for="type_Expense">
    <input onclick="autoSubmit();" type="radio" class="radio" id="type_Expense" name="newRECtype" value="Expense"<?php if((isset($_POST['newRECtype']) && !$_POST['newRECtype'] == 'Expense')) echo ' checked="checked"'?> />
    <span>Výdej</span></label>
    <label class="checktext" for="type_Earning">
    <input onchange="autoSubmit();" type="radio" class="radio" id="type_Earning" name="newRECtype" value="Earnings" <?php if(isset($_POST['newRECtype']) && $_POST['newRECtype'] == 'Earnings')  echo ' checked="checked"' ?> />
    <span>Vklad</span></label>
    <label class="checktext" for="type_Saving">
    <input onchange="autoSubmit();" type="radio" class="radio" id="type_Saving" name="newRECtype" value="Saving" <?php if(isset($_POST['newRECtype']) && $_POST['newRECtype'] == 'Saving')  echo ' checked="checked"' ?> />
    <span>Spoření</span></label>
</form>

<?php
$radio = $_POST['newRECtype'];
if(isset($radio)){
    if($radio == "Expense"){
        include "./NewRec/expense.php";
    }
    elseif($radio == "Earnings"){
        include "./NewRec/earning.php";
    }elseif($radio == "Saving"){
        include "./NewRec/saving.php";
    }else{
        echo "Error";
    }
}
?>
</div>