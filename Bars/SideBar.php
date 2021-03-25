<head>
  <link rel="stylesheet" href="./css/bars.css">
</head>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "finance";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$SUMBsql = "SELECT SUM(cash_Value) AS ValSum FROM allcash WHERE usr_Id = '2' AND NOT type_Id ='4' ";
$SUMBresult = $conn->query($SUMBsql);
$Brow = mysqli_fetch_assoc($SUMBresult);
$Bsum = $Brow['ValSum'];
$SUMNsql = "SELECT SUM(cash_Value) AS ValSum FROM allcash WHERE usr_Id = '1' AND NOT type_Id ='4' ";
$SUMNresult = $conn->query($SUMNsql);
$Nrow = mysqli_fetch_assoc($SUMNresult);
$Nsum = $Nrow['ValSum'];
$SaveNsql = "SELECT ROUND(SUM(cash_Value), 0) AS ValSum FROM allcash WHERE usr_Id = '1' AND type_Id ='4' ";
$SaveNresult = $conn->query($SaveNsql);
$NSaverow = mysqli_fetch_assoc($SaveNresult);
$NSave = $NSaverow['ValSum'];
$SaveBsql = "SELECT ROUND(SUM(cash_Value), 0) AS ValSum FROM allcash WHERE usr_Id = '2' AND type_Id ='4' ";
$SaveBresult = $conn->query($SaveBsql);
$BSaverow = mysqli_fetch_assoc($SaveBresult);
$BSave = $BSaverow['ValSum'];
$Savesql = "SELECT ROUND(SUM(cash_Value), 0) AS ValSum FROM allcash WHERE type_Id ='4' ";
$Saveresult = $conn->query($Savesql);
$Saverow = mysqli_fetch_assoc($Saveresult);
$Save = $Saverow['ValSum'];
?>
<div class="sidenav">

  <div class="container text-center">
    <div class="row">
      <div class="col">
        <a class="nav-l" href="?page=newrec" method="post" style="color: #e9ecef">
          <i class="fas fa-hand-holding-usd fa-2x" c></i>
        </a>
      </div>
      <div class="col">
        <a href="?page=testing" method="post" style="color: #e9ecef">
          <span class="fa-layers fa-fw fa-2x">
            <i class="fas fa-book "></i>
            <i class="fas fa-square" data-fa-transform="shrink-6 up-2  "></i>
            <i class="fas fa-dollar-sign " data-fa-transform="shrink-8 up-2 " style=" color: #373d44"></i>
          </span>

        </a>

      </div>
    </div>
    <hr class="rounded"> <!-- Divider 1st user fas fa-democrat -->
    <div class="row">
      <div class="col">
        <i class="fab fa-dev fa-4x"></i> <br>
      </div>
    </div>
    <div class="row text-left">
      <div class="col">
        <i class="fas fa-wallet fa-2x"></i>
        <i style="padding-left: 15px ;"><?php echo $Nrow['ValSum'] ?> Kč</i> <br>
        <i class="fas fa-piggy-bank fa-2x"></i>
        <i style="padding-left: 15px ;"><?php echo $NSaverow['ValSum'] ?> Kč</i>
      </div>
    </div>

    <hr class="rounded"> <!-- Divider 2nd user fa-republican -->

    <div class="row">
      <div class="col">
        <i class="fas fa-tree fa-4x"></i> <br>
      </div>
    </div>
    <div class="row text-left">
      <div class="col">
        <i class="fas fa-wallet fa-2x"></i>
        <i style="padding-left: 15px ;"><?php echo $Brow['ValSum'] ?> Kč</i> <br>
        <i class="fas fa-piggy-bank fa-2x"></i>
        <i style="padding-left: 15px ;"> <?php echo $BSaverow['ValSum'] ?> Kč</i>
      </div>
    </div>

    <hr class="rounded"> <!-- Divider rozdil -->
    <div class="row">
      <div class="col">
        <!-- <i class="fas fa-balance-scale fa-2x"></i> <br> -->
        <span class="fa-layers fa-fw fa-2x">
          <i class="fas fa-house-user "></i>
          <i class="fas fa-square" data-fa-transform="shrink-4 down-2  "></i>
          <i class="fas fa-dollar-sign " data-fa-transform="shrink-6 down-1" style=" color: #373d44"></i>
        </span> <br>

        <i> <?php require "difference.php"?></i>
      </div>
    </div>
    <div class="row text-left">
      <div class="col">
        <i class="fas fa-piggy-bank fa-2x"></i>
        <i style="padding-left: 15px ;"> <?php echo $Saverow['ValSum'] ?> Kč</i>
      </div>
    </div>

    <hr class="rounded">

  </div>
</div>