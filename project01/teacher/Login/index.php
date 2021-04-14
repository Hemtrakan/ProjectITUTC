<?php
session_start();
?>

<?php
include('bootstrap.php');
?>
<style type="text/css">
  #btn {
    width: 48%;
  }

  body {
    background-color: #33ccff;
  }
</style>

<body>
  
  <div class="container" style="padding-top:100px">
  <p align="center"><img src="Logoutc.png" width="150px" height="150px" alt="Logo"></p>
    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4" style="background-color:#e0e0d1">

        <h3 align="center">
          Login Teacher
        </h3>
        <form name="formlogin" action="checklogin.php" method="POST" id="login" class="form-horizontal">
          <div class="form-group">
            <div class="col-sm-12">
              <input type="text" name="t_id" class="form-control" required placeholder="Username" />
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-12">
              <input type="password" name="t_pass" class="form-control" required placeholder="Password" />
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-12">
              <button type="submit" class="btn btn-success" id="btn">
                Login </button>
        </form>
        <button type="submit" class="btn btn-danger" id="btn" onclick="window.location.href='../../index.php'">Back </button>
      </div>
      <div class="col-sm-12">
      </div>
    </div>

  </div>
  </div>
  </div>
</body>