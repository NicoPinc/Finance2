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

            <span hidden><input type="radio" class="radio" id="type-Private" name="type" value="3" checked></span>

            <br>
            <div class="amount-formField">
            <label for="amount">Kolik </label>
            <input type="number" class="value" name="amount" min="1" max="50000" step=".01" required>
            </div>

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