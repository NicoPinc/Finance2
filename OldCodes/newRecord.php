<?php

if ( ! empty( $_POST['MainFormButton'] ) ) { /* print_r($_POST); exit */
    $conn = new mysqli("127.0.0.1","root", "", "finance");
    $data = array_map( array( $conn, 'real_escape_string'), $_POST);
    
    //convert to var
    extract( $data);

    //submit
    $query = "INSERT INTO allcash (cash_Value, cash_Date, cash_Descr, type_Id, usr_Id) VALUES ('$amount','$date', '$descr', '$type', '$userName')";
   /*   var_dump($query);*/
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
<form action="" method="POST" name="RecType">
    <label class="checktext" for="type_Expense">
    <input onclick="autoSubmit();" type="radio" class="radio" id="type_Expense" name="newRECtype" value="Expense"<?php if(!isset($_POST['newRECtype']) || (isset($_POST['newRECtype']) && $_POST['newRECtype'] == 'Expense')) echo ' checked="checked"'?> />
    <span>Výdaj</span></label>
    <label class="checktext" for="type_Earning">
    <input onchange="autoSubmit();" type="radio" class="radio" id="type_Earning" name="newRECtype" value="Earnings" <?php if(isset($_POST['newRECtype']) && $_POST['newRECtype'] == 'Earnings')  echo ' checked="checked"' ?> />
    <span>Výdělek</span></label>
</form>

    <form action="" method="POST" id="MainForm">
        <div class="form-field">
            <h4 class="section-title"> Kdo </h4>
            <label class="checktext" for="user-nico">
            <input type="radio" id="user-nico" name="userName" value="1" <?php if(!isset($_POST['userName']) || (isset($_POST['userName']) && $_POST['userName'] == '1')) echo ' checked="checked"'?> />
            <span>Nico</span></label>
            <label class="checktext" for="user-albert">
            <input type="radio" id="user-albert" name="userName" value="2" <?php if(isset($_POST['userName']) && $_POST['userName'] == '2')  echo ' checked="checked"' ?> />
            <span>Bert</span></label>
        </div>
   <!--     <div class="form-field">
            <br>
            <label for="amount">Kolik </label>
            <input type="number" class="value" name="amount" min="1" max="50000" step=".01">
        </div> -->


<?php 
$radio = $_POST['newRECtype'];
if( isset( $radio) ) : ?>
    <div class="amount-formField">
    <?php if($radio == "Expense") : ?>
    <label for="amount">Kolik </label>
    <input type="number" class="value" name="amount" min="-50000" max="-1" step=".01" required>
    <?php else : ?>
    <label for="amount">Kolik </label>
    <input type="number" class="value" name="amount" min="1" max="50000" step=".01" required>
    <?php endif; ?>
    </div>
<?php endif; ?>


            <?php 
if ( isset( $radio ) ) : ?>
        <div class="form-field">
        <?php  if($radio == "Expense") :  ?>
            <h4 class="section-title"> Typ </h4>
            <label class="checktext" for="type-Shared">
            <input type="radio" class="radio" id="type-Shared" name="type" value="1" checked>
            <span>Společný</span></label>
            <label class="checktext" for="type-Private">
            <input type="radio" class="radio" id="type-Private" name="type" value="2">
            <span>Privátní</span></label>
         <?php else :?>
            <h4 class="section-title"> Typ </h4>
            <label class="checktext" for="type-Shared">
            <input type="radio" class="radio" id="type-Shared" name="type" value="1" checked disabled>
            <span>Společný</span></label>
            <label class="checktext" for="type-Private">
            <input type="radio" class="radio" id="type-Private" name="type" value="2" disabled>
            <span>Privátní</span></label>
            <span hidden><input type="radio" class="radio" id="type-Private" name="type" value="3" checked></span>
        <?php endif; ?>
        </div>
<?php endif; ?>

            <br>
<?php
$month = date('m');
$day = date('d');
$year = date('Y');

$today = $year . '-' . $month . '-' . $day;
 ?>

            <div>
            <h4>Datum Nákupu</h4>
            <input type="date" value="<?php echo $today; ?>" id="date" name="date" >
            </div>
        <div>
            <h4>Popis</h4>
            <textarea id="Descr" name="descr" placeholder="Purchase description " required></textarea>
        </div>
        <div class="form-field">
            <br>
            <input type="submit" name="MainFormButton" value="Submit" require/>
        </div>
    </form>