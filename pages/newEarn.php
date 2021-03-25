<?php
if ( ! empty( $_POST ) ) { /* print_r($_POST); exit */
    $conn = new mysqli("localhost","root", "", "finance");
    $data = array_map( array( $conn, 'real_escape_string'), $_POST);
    
    //convert to var
    extract( $data);

        //submit if value not empty
        $query = "INSERT INTO allcash (earn_Value, earn_Descr, usr_Id) VALUES ('$amount', '$descr', '$userName')";
        $insert = $conn->query( $query );
}

?>

<div>
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
        <div>
            <h4 class="section-title"> Who </h4>
            <label class="checktext" for="user-nico">
            <input type="radio" id="user-nico" name="userName" value="1" checked>
            <span>Nico</span></label>
            <label class="checktext" for="user-albert">
            <input type="radio" id="user-albert" name="userName" value="2" >
            <span>Bert</span></label>
        </div>
        <div>
            <br>
            <label for="amount">How much : </label>
            <input type="number" id="value" name="amount" min="1" max="50000">
        </div>
        <div>
            <br>
            <h4>Description</h4>
            <textarea id="Descr" name="descr" placeholder="Earning description (recommended)"></textarea>
        </div>
        <div>
            <br>
            <button class="blue-button">Submit</button>
        </div>
    </form>
    </div>
