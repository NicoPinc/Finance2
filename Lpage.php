<?php
include "DBconn.php";


if(isset($_POST['but_submit'])){

    $uname = mysqli_real_escape_string($conn,$_POST['txt_uname']);
    $password = mysqli_real_escape_string($conn,$_POST['txt_pwd']);


    if ($uname != "" && $password != ""){

        $sql_query = "select count(*) as cntUser from admin where admin_Name='".$uname."' and admin_pass='".$password."'";
        $result = mysqli_query($conn,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0){
            $_SESSION['uname'] = $uname;
            header('Location: index.php');
        }else{
            echo "Invalid username and password";
        }

    }

}
?>
<html>
  <head>
    <title>Přihlášení</title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/bootstrap4/css/bootstrap.css">
    <link rel="stylesheet" href="css/fontawesome-free-5.15.2-web/css/all.css">
  </head>
  <body>
    <div class="container" id="centered">
      <div class="row">
        <div class="col">
          <div class="card text-center" style="width: fit-content;margin: auto;">
            <form method="post" action="">
              <div class="card-header">
                <h1>Vítej</h1>
              </div>
              <br>
              <div class="card-body">
              <h5>Pro pokračování na stránku zadej prosím PIN</h5>
              <br>
              <div hidden>
                <input type="text" class="textbox" id="txt_uname" name="txt_uname" placeholder="Username" value="Admin"/>
              </div>
              <div>
                <input type="password" class="textbox" id="txt_uname" name="txt_pwd" placeholder="Zadej PIN"/>
              </div>
              <br>
              <div>
                <button id="button" type="submit" value="Submit" name="but_submit"><i class="fas fa-sign-in-alt fa-2x" title="Přihlásit se"></i></button>
              </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>

<style>
  #centered {
    position: fixed;
  top: 25%;
  left: 50%;
  /* bring your own prefixes */
  transform: translate(-50%, -50%);
}
#button{
    padding-top: 1%;
    border: none;
    background: none;
  }
/* placeholder alling center*/
::-webkit-input-placeholder {
  text-align: center;
}
:-moz-placeholder { /* Firefox 18- */
  text-align: center;  
}
::-moz-placeholder {  /* Firefox 19+ */
  text-align: center;  
}
:-ms-input-placeholder {  
  text-align: center; 
}
</style>