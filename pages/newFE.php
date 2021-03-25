<?php
if ( ! empty( $_POST ) ) { /* print_r($_POST); exit */
    $conn = new mysqli("localhost","root", "", "finance");
    $data = array_map( array( $conn, 'real_escape_string'), $_POST);
    
    //convert to var
    extract( $data);

    //submit
    $query = "INSERT INTO allcash (cash_Value, cash_Descr, type_Id, usr_Id) VALUES ('$amount', '$descr', '$type', '$userName')";
    $insert = $conn->query( $query );
}

?>


<?php if ( isset( $insert ) ) : ?>
    <div class="Message">
        <?php if( $insert == true ) : ?>
            <p class="SuccMsg">Data successfully inserted</p>
        <?php else : ?>
            <p class="ErrMsg"> There is an Error </p>
            <?php endif; ?>   
    </div>
    <?php endif; ?> 


    <?php
$sort = "";
if(isset($_POST["sort"]))
{ $sort = $_POST["sort"]; }
?>
<html>
<head>
<script>
function autoSubmit()
{
    var formObject = document.forms['theForm'];
    formObject.submit();
}
</script>
<form action="" method="POST" name="theForm">
<div class="EorFRadio">
    <label class="checktext" for="EarnR">
    <input type="radio" id="EarnR" name="radiotype" <?php if ($radiotype == 'EarnRadio') { ?>checked='checked' <?php } ?>  value="EarnRadio">
    <span>New Earning</span></label>
    <label class="checktext" for="FundR">
    <input type="radio" id="FundR" name="radiotype" <?php if ($radiotype == 'FundRadio') { ?>checked='checked' <?php } ?> value="FundRadio" > 
    <span>New Fund</span></label>
    </div>
</form>


    <form action="" method="post">
        <div class="form-field">
            <h4 class="section-title"> Funds </h4>
            who:
            <label class="checktext" for="user-nico">
            <input type="radio" id="user-nico" name="userName" value="1" checked>
            <span>Nico</span></label>
            <label class="checktext" for="user-albert">
            <input type="radio" id="user-albert" name="userName" value="2" >
            <span>Bert</span></label>
        </div>
<?php 
$radio = $_POST['radiotype'];
if ( isset( $radio ) ) : ?>
        <div class="form-field">
        <?php  if($radio == "EarnRadio") :  ?>
            <br>
            <label for="amount">How much : </label>
            <input type="number" class="value" name="amount" min="1" max="50000">
            <?php else :?>
            <br>
            <label for="amount">How much : </label>
            <input type="number" class="value" name="amount" min="-1" max="-50000">
            <?php endif; ?>
        </div>
        <?php endif; ?>
  

<?php 
$radio = $_POST['radiotype'];
if ( isset( $radio ) ) : ?>
        <div class="form-field">
        <?php  if($radio == "FundRadio") :  ?>
            <h4 class="section-title"> For Who </h4>
            <label class="checktext" for="type-Shared">
            <input type="radio" class="radio" id="type-Shared" name="type" value="1" checked>
            <span>Us</span></label>
            <label class="checktext" for="type-Private">
            <input type="radio" class="radio" id="type-Private" name="type" value="2">
            <span>Themselves</span></label>
         <?php else :?>
            <h4 class="section-title"> For Who </h4>
            <label class="checktext" for="type-Shared">
            <input type="radio" class="radio" id="type-Shared" name="type" value="1" checked disabled>
            <span>Us</span></label>
            <label class="checktext" for="type-Private">
            <input type="radio" class="radio" id="type-Private" name="type" value="2" disabled>
            <span>Themselves</span></label>
            <span hidden><input type="radio" class="radio" id="type-Private" name="type" value="3" checked></span>
        <?php endif; ?>
        </div>
<?php endif; ?>



        <div>
            <br>
            <h4>Description</h4>
            <textarea id="Descr" name="descr" placeholder="Purchase description (optional)"></textarea>
        </div>
        <div class="form-field">
            <br>
            <button class="blue-button">Submit</button>
        </div>
    </form>
