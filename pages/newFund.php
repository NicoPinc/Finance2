<?php
if ( ! empty( $_POST ) ) { /* print_r($_POST); exit */
    $conn = new mysqli("localhost","root", "", "finance");
    $data = array_map( array( $conn, 'real_escape_string'), $_POST);
    
    //convert to var
    extract( $data);

    //submit
    $query = "INSERT INTO purchases (pur_Value, pur_Descr, type_Id, usr_Id) VALUES ('$amount', '$descr', '$type', '$userName')";
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
    <form action="" method="post">
        <div class="form-field">
            <h4 class="section-title"> Who Payed </h4>
            <label class="checktext" for="user-nico">
            <input type="radio" id="user-nico" name="userName" value="1" checked>
            <span>Nico</span></label>
            <label class="checktext" for="user-albert">
            <input type="radio" id="user-albert" name="userName" value="2" >
            <span>Bert</span></label>
        </div>
        <div class="form-field">
            <br>
            <label for="amount">How much : </label>
            <input type="number" class="value" name="amount" min="1" max="50000" step=".01">
        </div>
        <div class="form-field">
            <h4 class="section-title"> For Who </h4>
            <label class="checktext" for="type-Shared">
            <input type="radio" class="radio" id="type-Shared" name="type" value="1" checked>
            <span>Us</span></label>
            <label class="checktext" for="type-Private">
            <input type="radio" class="radio" id="type-Private" name="type" value="2">
            <span>Themselves</span></label>
        </div>
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
