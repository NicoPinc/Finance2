<?php
include "config.php";

if ( ! empty( $_POST ) ) { /* print_r($_POST); exit */
    $data = array_map( array( $conn, 'real_escape_string'), $_POST);
    
    //convert to var
    extract( $data);

    //submit
    $query = "INSERT INTO users usr_Name VALUES '$username' ";
    $insert = $conn->query( $query );
}

?>