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
    <input onclick="autoSubmit();" type="radio" class="radio" id="type_Expense" name="newRECtype" value="Expense"<?php if((isset($_POST['newRECtype']) && $_POST['newRECtype'] == 'Expense')) echo ' checked="checked"'?> />
    <span>Výdej</span></label>
    <label class="checktext" for="type_Earning">
    <input onchange="autoSubmit();" type="radio" class="radio" id="type_Earning" name="newRECtype" value="Earnings" <?php if(isset($_POST['newRECtype']) && $_POST['newRECtype'] == 'Earnings')  echo ' checked="checked"' ?> />
    <span>Vklad</span></label>
    <label class="checktext" for="type_Saving">
    <input onchange="autoSubmit();" type="radio" class="radio" id="type_Saving" name="newRECtype" value="Saving" <?php if(isset($_POST['newRECtype']) && $_POST['newRECtype'] == 'Saving')  echo ' checked="checked"' ?> />
    <span>Spoření</span></label>
</form>

