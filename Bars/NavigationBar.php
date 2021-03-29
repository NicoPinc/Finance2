
<div class="col" style="padding-left: 0px; padding-right: 0px;">
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ffffff; color: #212429;">
  <a class="navbar-brand" href="?page=indexStats">Statistiky</a>
  <a class="navbar-brand" href="?page=oldRec">Old Records *temporary*</a>

  <?php
    $day = date("l");
    switch ($day){
      case 'Monday' : $day = "pondělí"; break;
      case 'Tuesday' : $day = "úterý"; break;
      case 'Wednesday' : $day = "středa"; break;
      case 'Thursday' : $day = "čtvrtek"; break;
      case 'Friday' : $day = "pátek"; break;
      case 'Saturday' : $day = "sobota"; break;
      case 'Sunday' : $day = "neděle"; break;
    }
    ?>
<div class="mx-auto"> <!--centers stuff -->
<i><?php echo "Dneska je " .$day. " ". date("d.m.Y"). "" ?></i>

  </div>
</nav>
<div class="container-fluid">
</div>
</div>