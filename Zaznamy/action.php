<?php  
//action.php
include './DBconn.php';

$input = filter_input_array(INPUT_POST);

$first_name = mysqli_real_escape_string($connect, $input["first_name"]);
$last_name = mysqli_real_escape_string($connect, $input["last_name"]);

if($input["action"] === 'edit')
{
 $query = "
 UPDATE tbl_user 
 SET first_name = '".$first_name."', 
 last_name = '".$last_name."' 
 WHERE id = '".$input["cash_Id"]."'
 ";

 mysqli_query($connect, $query);

}
if($input["action"] === 'delete')
{
 $query = "
 DELETE FROM allcash2 
 WHERE id = '".$input["cash_Id"]."'
 ";
 mysqli_query($connect, $query);
}

echo json_encode($input);

?>