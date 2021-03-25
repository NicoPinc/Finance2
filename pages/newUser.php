<?php
if ( ! empty( $_POST ) ) { /* print_r($_POST); exit */
    $conn = new mysqli("localhost","root", "", "finance");
    $data = array_map( array( $conn, 'real_escape_string'), $_POST);
    
    //convert to var
    extract( $data);

    //submit
    $query = "INSERT INTO users (usr_Name) VALUES ('$userName') ";
   // print_r($query); exit;
    $insert = $conn->query( $query );
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../css/skeuos.css">
</head>
<body>
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
            <input type="text" class="text" name="userName" placeholder="Choose your username" required>
        </div>
        <div class="form-field">
            <button class="button">Submit</button>
        </div>
    </form>
    
</body>
</html>