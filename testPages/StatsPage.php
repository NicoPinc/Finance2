<style>
  .card{
    margin-bottom: 24px;
    box-shadow: 0 0 0.875rem 0 rgb(41 48 66 / 7%);
    align-items: center;
  }
  .flex-fill {
    flex: 1 1 auto!important;
}
#FioStats {
  flex: end;
}
</style>
<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="card flex-fill">hello
        <?php include("./Graphs/pieChart.php"); ?>
      </div>
  </div>
    <div class="col">
      <div class="card flex-fill">
        row 1 col 2
      </div>
    </div>
  </div>
  <div class="row">
  <div class="col">
      <div class="card flex-fill">
        row 2 col 1
      </div>
  </div>
  <div class="col">
      <div class="card flex-fill">
        row 2 col 2
      </div>
  </div>
  </div>
  <div class="row">
  <div class="col" id="FioStats">
      <div class="card flex-fill">
        row 3 col 1
      </div>
    </div>
  </div>
</div>