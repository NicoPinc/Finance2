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
    <title>Login</title>
</head>
<body>
  <?php
  require_once "Database/config.php";
  ?>

  <div class="container">
    <div class="card">
    To enter, you need to provide a key
    <div class="form=element" >
    <form action="" method="post" name="login" >
      <label for="">Key : </label>
      <input type="password" name="key" required>
      <button type="submit" name="login" value="login" >Lemme in</button>
    </form>
    </div>
    </div>
  </div>
</body>

</html>