<style>
  #main{
    width: 100%;
    margin: 0 auto;
  }
  #page{
    text-align: center  ;
    position: absolute;
    width: 85%;
    float: left;
    padding: 2.5rem 2.5rem 1.5rem;
  }
  #sidebar{
    position: fixed;
    width: 25%;
    min-width: 260px;
    max-width: 260px;
    float: right;
}
</style>
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
    <?php include "Bars/NavigationBar.php"?>
    <title>Index</title>
</head>
<body>

<div id="main">

  <div id="sidebar" > <!-- SideBar -->
    <?php include "Bars/SideBar.php" ?>
  </div>

  <div id="page">

    <?php
    $mypage = isset($_GET['page']) ? $_GET['page'] : 'home';
    //$mypage = $_GET['page'];
    switch($mypage)
    {
      case "testing":
        @include("testCode/TTP.php");
        break;
    case "newEarn":
        @include("pages/newEarn.php");
        break;

    case "newFund":
      @include("pages/newFund.php");
      break;

    case "testing":
      @include("TableCrossroads.php");
      break;

    case "newrec":
      @include("NewRecord.php");
      break;
    case "edTable":
      @include("testPages/editableTable.php");
      break;

    case "NicoAllStats":
      @include("pages/NicoAllStats.php");
      break;
      case "BertAllStats":
        @include("pages/BertAllStats.php");
        break;

    case "StatsAllEarn":
      @include("pages/showEarnAll.php");
      break;

    case "StatsNicoEarn":
      @include("pages/showEarnNico.php");
      break;

    case "StatsBertEarn":
      @include("pages/showEarnBert.php");
      break;

    case "StatsAllExp":
      @include("pages/showPurAll.php");
      break;

    case "StatsNicoExp":
      @include("pages/showPurNico.php");
      break;

    case "StatsBertExp":
      @include("pages/showPurBert.php");
      break;

      
    default:
        @include("default.php");
    }
    ?>
  </div>


</div>  
</body>

</html>