<style>
  html, body {
    height:100%;
}
  #MainPage{ 
  text-align: center;
  width: 100%;
  float: left;
  padding: 2.5rem 2.5rem 1.5rem;
}
    .page {
  display: table;
  width: 100%;
}
.page-content,
.sidebar {
  display: table-cell;
}
.sidebar {
  width: 260px;
}
</style>
<?php
  include('DBconn.php');

  // Check user login or not
if(!isset($_SESSION['uname'])){
  header('Location: Lpage.php');
}
// logout
if(isset($_POST['but_logout'])){
  session_destroy();
  header('Location: Lpage.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap4/css/bootstrap.css">
    <link rel="stylesheet" href="css/fontawesome-free-5.15.2-web/css/all.css">
    <script defer src="css/fontawesome-free-5.15.2-web/js/all.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="src/jquery-tabledit-1.2.3/jquery.tabledit.min.js"></script>
    <title>Finance</title>
</head>
<body>


<div class="page">
  <div class="page-content">
    <div class="row">
      <div class="col-md">
      <div id="NavBar">
            <?php include "Bars/NavigationBar.php"?>
          </div>
          <div id="MainPage">
            <?php
            $mypage = isset($_GET['page']) ? $_GET['page'] : 'home';
            //$mypage = $_GET['page'];
            switch($mypage){
              case "oldRec":
                @include("testCode/TTP.php");
                break;
            case "záznamy":
                @include("Zaznamy/zaznamy.php");
                break;

            case "indexStats":
              @include("StatsPage.php");
              break;

            case "newrec":
              @include("NewRecord.php");
              break;
            default:
                @include("home.php");
            }
            ?>
          </div>
      </div>
    </div>
  </div>
  <div class="sidebar">
    <?php  include "Bars/SideBar.php" ?>
  </div>
</div>

</html>