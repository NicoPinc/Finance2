<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/skeuos.css">
    <title>Bert´s Balance</title>
</head>
<body>
    <table style="width:100%">
    <thead>
    </thead>
    <tbody>
        <?php
        include_once('Database/config.php');
        $resEx = $conn->query('SELECT SUM(pur_Value) AS ValueEx FROM purchases WHERE usr_Id = 2'); 
        $rowEx = $resEx->fetch_assoc(); 
        $sumEx = $rowEx['ValueEx'];
        
        $resEarn = $conn->query('SELECT SUM(earn_Value) AS ValueEarn FROM earnings WHERE usr_Id = 2'); 
        $rowEarn = $resEarn->fetch_assoc(); 
        $sumEarn = $rowEarn['ValueEarn'];
        
        $total = $sumEarn - $sumEx;
        
        echo "your total balance is: " .$total. " Kč";
        ?>
    </tbody>
</table>
</body>
</html>
