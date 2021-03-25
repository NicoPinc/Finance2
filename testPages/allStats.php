<html>
<head>

<script>
function autoSubmit()
{
    var formObject = document.forms['theForm'];
    formObject.submit();
}
</script>

</head>
<body>
<form name='theForm' id='theForm'>
    <input type="radio" name="sort" <?php if ($sort == 'upload_time') { ?>checked='checked' <?php } ?>value="upload_time" onChange="autoSubmit();" />Recently Uploaded
    <input type="radio" name="sort" <?php if ($sort == 'article') { ?>checked='checked' <?php } ?> value="article" onChange="autoSubmit();" /> Alphabetically
    <input type="radio" name="sort" <?php if ($sort == 'year') { ?>checked='checked' <?php } ?> value="year" onChange="autoSubmit();" /> Most Recent
</form>
</body>
</html>
<?php
/*$sort = "";
if(isset($_POST["sort"]))
{ $sort = $_POST["sort"]; }
*/
$sort1 = $_POST['sort'];
switch($sort1) {
    case "upload_time":
      echo "case 1";
      break;
    case "article":
        echo "case 2";
      break;
    case "year":
        echo "case 3    ";
      break;
    default: die("Invalid type");
  }
?>
