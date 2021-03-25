<?php
include ("./Database/config.php");

$userData = mysqli_query($conn,"SELECT * FROM users
ORDER BY usr_Id ASC");
$response = array();

while($row = mysqli_fetch_assoc($userData)){
    $response[] = $row;
}
?>