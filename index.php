<?php
if(time()>=strtotime('2018/6/23')){header('Location: uptodate.php');}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>SMEX</title>
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/font-awesome/css/font-awesome.min.css">	
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="image/logo.png">	
</head>

<body style="background-image:url(image/exambak1.jpg)">
<div id="logincontainer">
  <div class="row logincontent">
  <div class="col-md-4 col-md-offset-4 col-xs-10 col-xs-offset-1">
    <div class="panel panel-info">
      <div class="panel-heading"><i class="fa fa-key"></i>    Exam Login</div>
      <div class="panel-body">
        <form action="script/userlogin.php" class="form-horizontal" method="post" enctype="multipart/form-data" name="f1">
  <!--div class="form-group">
    <label for="inputEmail3" class="col-sm-3 control-label">Username</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="canduname" name="canduname" placeholder="Candidate Username">
    </div>
  </div-->
  <div class="form-group">
    <label for="inputexam" class="col-sm-3 control-label">Exam Code</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="examcode" name="examcode" placeholder="Your exam code">
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-success">Sign in</button>
    </div>
  </div>
</form>
      </div>
    </div>
    </div>
   
   </div>
</div>
<div align="center" class="loginfooter">SMEX by <img src="image/Main-Logo-small.png" width="127" height="50" /> For Atanda CBT Center</div>
<script src="js/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
   
</body>
</html>