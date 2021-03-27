<?php
  require('../Database/config.php');

    $data = array_map( array( $conn, 'real_escape_string'), $_POST);
    
    //convert to var
    extract( $data);
    //submit

    $query = "INSERT INTO allcash2 (cash_Value, cash_Date, cash_Cat, cash_Desc, type_Id, usr_Id) VALUES ('$amount','$date','$cat', '$descr', '$type', '$userName')";

        //nefunguje vkladani vkladu a sporeni protoze ani jeden nemaji cash category
   var_dump($query);
  $insert = $conn->query( $query );
 if ( isset( $insert ) ) : ?>
    <div class="Message">
        <?php if( $insert == true ) : ?>
            <p class="SuccMsg">Data successfully inserted</p>
        <?php else : ?>
            <p class="ErrMsg"> There is an Error </p>
            <?php endif; ?>   
    </div>
    <?php endif; ?> 

?>