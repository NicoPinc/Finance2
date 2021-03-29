<form action="" method="POST" id="MainForm">
  <!-- Výběr uživatele -->
  <div class="form-field">
    <h4 class="section-title"> Kdo </h4>
    <label class="checktext" for="user-nico">
      <input type="radio" id="user-nico" name="userName" value="1" <?php if (!isset($_POST['userName']) || (isset($_POST['userName']) && $_POST['userName'] == '1')) echo ' checked="checked"' ?> />
      <span>Nico</span>
    </label>
    <label class="checktext" for="user-albert">
      <input type="radio" id="user-albert" name="userName" value="2" <?php if (isset($_POST['userName']) && $_POST['userName'] == '2')  echo ' checked="checked"' ?> />
      <span>Bert</span>
    </label>
  </div>
  <!-- Výběr typu, je Hidden, není potřeba vyplňovat -->
  <span hidden><input type="radio" class="radio" id="type-Private" name="type" value="4" checked></span>
  <!-- Zadání Sumy -->  
  <div class="amount-formField">
    <label for="amount"><h4> Kolik </h4>
      <input type="number" name="amount" min="-50000" max="50000" step="500" value="2000" />
    </label>
  </div>
  <!-- Zadání Datumu -->
  <?php
  $month = date('m');
  $day = date('d');
  $year = date('Y');

  $today = $year . '-' . $month . '-' . $day;
  ?>
  <div>
    <h4>Datum</h4>
    <input type="date" value="<?php echo $today; ?>" id="date" name="date">
  </div>
  <!-- Zadání Popisku -->
  <div>
    <h4>Popis</h4>
    <textarea id="Descr" name="descr" placeholder="Purchase description " required></textarea>
  </div>
  <!-- Vložit Tlačítko -->
  <br>
  <div class="form-field">
    <input type="submit" name="MainFormButton" value="Vložit Záznam" require />
  </div>
</form>