
<div class="col" style="padding-left: 0px; padding-right: 0px;">
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ffffff; color: #212429;">
  <a class="navbar-brand" href="?page=indexStats">Statistiky</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

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

<!-- OLD STATS
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

    <li class="nav-item active dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Stats
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="?page=NicoAllStats">Nico All Stats</a>
          <a class="dropdown-item" href="?page=BertAllStats">Bert All Stats</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="?page=StatsAllEarn">Show All Earnings</a>
          <a class="dropdown-item" href="?page=StatsNicoEarn">Nico Earnings</a>
          <a class="dropdown-item" href="?page=StatsBertEarn">Bert Earnings</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="?page=StatsAllExp">Show All Expenses</a>
          <a class="dropdown-item" href="?page=StatsNicoExp">Nico Expenses</a>
          <a class="dropdown-item" href="?page=StatsBertExp">Bert Expenses</a>
        </div>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="?page=testing" method="post" >testing  <span class="sr-only">(current)</span></a>
      </li>
    </ul>

    </div>
-->
  </div>
</nav>
<div class="container-fluid">
</div>
</div>