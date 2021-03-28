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

        <div class="form-field">

            <h4 class="section-title"> Typ </h4>
            <label class="checktext" for="type-Shared">
            <input type="radio" class="radio" id="type-Shared" name="type" value="1" checked>
            <span>Společný</span></label>
            <label class="checktext" for="type-Private">
            <input type="radio" class="radio" id="type-Private" name="type" value="2">
            <span>Privátní</span></label>
        </div>

            <br>
            <div class="amount-formField">
            <label for="amount">Kolik </label>
    <input type="number" class="value" name="amount" min="-50000" max="-1" step=".01" required>
            </div>

            <br>
<?php
$month = date('m');
$day = date('d');
$year = date('Y');

$today = $year . '-' . $month . '-' . $day;
 ?>

            <div>
            <h4>Datum</h4>
            <input type="date" value="<?php echo $today; ?>" id="date" name="date" >
            </div>
            <br>
            <div>
            <h4>Kategorie</h4>
            <select name="cat" id="cat" class="custom-select" multiple size="4" style="width: auto;" >
            <?php
              $conn = new mysqli("127.0.0.1","root", "", "finance");
              $sql = "SELECT cat_Id,cat_Name FROM pur_cat";
              $Res = $conn->query($sql);
              while ($row = mysqli_fetch_assoc($Res)){
                echo "<option value=". $row['cat_Id'] .">". $row['cat_Name'] ."</option >";
              }
            ?>
            
            </select>
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