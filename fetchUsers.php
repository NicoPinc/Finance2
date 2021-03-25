<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MainPage</title>
</head>
<body>
    Hello World
    <table style="width:100%">
    <thead>
  <tr>
    <th>User Id</th>
    <th>UserName</th>
  </tr>
    </thead>
    <tbody>
        <?php
        print_r($_REQUEST);
        include_once('Database/config.php');
        $query = $conn->query("SELECT * FROM users ORDER by usr_Id");
        while($row = mysqli_fetch_array($query)){
            echo "<tr>";
            echo "<td>".$row['usr_Id']."</td>";
            echo "<td>".$row['usr_Name']."</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>
</body>
</html>
