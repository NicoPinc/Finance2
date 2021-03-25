<script>
function autoSubmit2()
{
    var typeformObject = document.forms['TypeForm'];
    typeformObject.submit();
}
</script>

<div>
    <form action="" method="POST" name="TypeForm">
        <label for="TypeAll">
        <input onclick="autoSubmit2();" type="radio" id="TypeAll" name="TypeRadio" value="All">
        <span>All</span></label>
        <label for="TypeNico">
        <input type="radio" id="TypeNico" name="TypeRadio" value="Nico">
        <span>Nico</span></label>
    </form>
</div>

<?php
$radio = $_POST['TypeRadio'];
if( $radio == 'All') : ?>
    <div>All</div>

<?php elseif ($radio == 'Nico') : ?>
    <div>Nico</div>

<?php elseif($radio == 'Bert') : ?>
    <div>Bert</div>
<?php endif; ?>
<?php 
/*
    <div>
        <form action="" method="POST" name="TypeForm">
            <label class="checktext" for="TypeAll">
            <input onclick="autoSubmit2();" type="radio" class="radio" id="TypeAll" name="Type" value="AllType"<?php if(!isset($_POST['Type']) || (isset($_POST['Type']) && $_POST['Type'] == 'AllType')) echo ' checked="checked"'?> />
            <span>All</span></label>
            <label class="checktext" for="TypeExpense">
            <input onchange="autoSubmit2();" type="radio" class="radio" id="TypeExpense" name="Type" value="NicoType" <?php if(isset($_POST['Type']) && $_POST['Type'] == 'NicoType')  echo ' checked="checked"' ?> />
            <span>Nico</span></label>
            <label class="checktext" for="TypeEarning">
            <input onchange="autoSubmit2();" type="radio" class="radio" id="TypeEarning" name="Type" value="BertType" <?php if(isset($_POST['Type']) && $_POST['Type'] == 'BertType')  echo ' checked="checked"' ?> />
            <span>Bert</span></label>
        </form>
    </div>
 */?>