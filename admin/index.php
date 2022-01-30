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
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/font-awesome/css/font-awesome.min.css">	
    <link rel="stylesheet" href="../css/style.css">	
    <link rel="shortcut icon" href="../image/logo.png">
</head>

<body>
<div id="logincontainer">
  <div class="row logincontent">
  <div class="col-md-4 col-md-offset-4 col-xs-10 col-xs-offset-1">
    <div class="panel panel-info">
      <div class="panel-heading"><i class="fa fa-key"></i>    Admin Login</div>
      <div class="panel-body">
 <form action="adloginscript.php" class="form-horizontal" method="post" id="login-form" enctype="multipart/form-data" name="f1" data-toggle="validator">
  <div class="form-group">
    <label for="adminid" class="col-sm-2 control-label">Admin Id</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="aid" name="aid" placeholder="Admin Id goes here" required>
    </div>
  </div>
  <div class="form-group">
    <label for="password" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="apwd" name="apwd" placeholder="Password" required>
    </div>
  </div>
  <div id="message"></div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" id="loginbut" class="btn btn-success">Sign in</button>
    </div>
  </div>
</form>
      </div>
    </div>
   
   </div>
</div>
</div>
<div align="center" class="loginfooter">SMEX by <img src="../image/Main-Logo-small.png" width="127" height="50" /> For Atanda CBT Center</div>
<script src="../js/jQuery-2.1.4.min.js"></script>
<script src="../js/validator.js"></script>
    <!-- Bootstrap 3.3.5 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script>
/*App Login*/
$(document).on('click','#loginbutt',function(ev){
	alert('here');
	var validator = $("#login-form").data("bs.validator");
	validator.validate();
	 ev.preventDefault();
 if (!validator.hasErrors()) 
  {
	  
	$("#message").empty();		
	var aid=$('#aid').val();
	var apwd=$('#apwd').val();
	myformData='aid='+aid +'&apwd='+apwd;
	//alert(myformData);
	
$.ajax({
    url: 'adloginscript.php',
    type: 'POST',
    data: myformData,
    //cache: false,
    dataType: 'html',
	beforeSend: function()
   { 
    $("#message").fadeIn(200).html('<div class="alert alert-info"><span class="glyphicon glyphicon-ok-sign pull-left"></span>&nbsp;&nbsp;Authenticatiing.......<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
	 // $('#lognotice').fadeOut(2000).html('<div id="authnotice" class="alert alert-info"><span class="glyphicon glyphicon-info-sign"></span>&nbsp;&nbsp;Authenticating.......</div>');
   },
    success: function (logindata) {
		
		if(logindata=='OK')
		{	
		alert(logindata);
			//$('#message').fadeIn(3000).html(' <div class="alert alert-success"><span class="glyphicon glyphicon-ok-sign pull-left"></span>&nbsp;&nbsp;Loggin Successful<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
			//window.location='feeapp/ptapp/apphome.php';
			window.location='examadmin.php';
			
		}
		else (logindata=='NOTOK')
		{	
		
			$('#message').fadeIn(3000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-ok-sign pull-left"></span>&nbsp;&nbsp;'+logindata+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
			$('#login-form')[0].reset();
			
		}
	 
    },
	error: function(logindata){
		
			$('#message').fadeIn(3000).html('<div class="alert alert-Danger"><span class="glyphicon glyphicon-ok-sign pull-left"></span>&nbsp;&nbsp;An Error just Occured; Please try again<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
			$('#login-form')[0].reset();
			 
		 }
  });return false;  
  }
});
/*App Login ends*/
</script>   
</body>
</html>