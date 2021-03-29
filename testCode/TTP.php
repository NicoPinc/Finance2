//this is curent working records table - uses Tables folder
<div class="container-fluid">
  <div class="row">


    <form action="" method="POST" name="form">
      <div class="form-row">
        <div class="form-group">
          <select class="form-control" name="user">
            <option value="All" selected>All Users</option>
            <option value="Nico">Nico</option>
            <option value="Bert">Bert</option>
          </select>
        </div>
        <div class="form-group ">
          <select class="form-control" name="type">
            <option value="All" selected>All Money</option>
            <option value="Expenses">Expenses</option>
            <option value="Earnings">Earnings</option>
            <option value="Savings">Savings</option>
          </select>
        </div>

        <div class="form-group">
          <select class="form-control" name="date">
            <option value="Current">Current Month</option>
            <option value="Last">Last Month</option>
            <option value="All">All Time</option>
          </select>
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-dark">Show</button>
        </div>
      </div>
    </form>

  </div>
  <div class="row">
    <div class="card flex-fill w-100">
      <div class="card-body d-flex">

        <table class="table table-sm table-hover" style="padding: 10px;">
          <?php
          $ListUsers = $_POST['user'];
          $ListType = $_POST['type'];
          include("./tables/" . $ListUsers . "/" . $ListType . "" . $ListUsers . ".php");

          ?>
        </table>

      </div>
    </div>
  </div>
</div>