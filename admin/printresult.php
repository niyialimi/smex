<?php 
require_once('../Connections/examcon.php');
session_start();
//mysqli_select_db($iqcon,"cbt_db");
if (!isset ($_SESSION['username']) && !isset( $_SESSION['password']))
{
	header("Location:index.php");
	exit();
}
?>
<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <!--link rel="icon" href="http://getbootstrap.com/favicon.ico"-->

    <title>SMEX Print</title>

   <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/font-awesome/css/font-awesome.min.css">	
    <link rel="stylesheet" href="../css/style.css">	
   
    <link href="../css/dashboard.css" rel="stylesheet">
	<link rel="shortcut icon" href="../image/logo.png">
   
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">SMEX</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Exam Admin</a></li>
            
          </ul>
          <!--form class="navbar-form navbar-right">
            <input class="form-control" placeholder="Search..." type="text">
          </form-->
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="examadmin.php"><span style="padding-right:5px;" class="glyphicon glyphicon-dashboard"></span>Dashboard</a></li>
                <li><a href="reg.php"><span style="padding-right:5px;" class="glyphicon glyphicon-user"></span>Add Candidate</a></li>
                <li><a href="viewcand.php"><span style="padding-right:5px;" class="glyphicon glyphicon-eye-open"></span>View Candidates</a></li>
                <li><a href="createcat.php"><span style="padding-right:5px;" class="glyphicon glyphicon-pencil"></span>Add Exam Category</a></li>
                 <li><a href="questionpage.php"><span style="padding-right:5px;" class="glyphicon glyphicon-pencil"></span>Add Question</a></li>
                 <li><a href="viewquest.php"><span style="padding-right:5px;" class="glyphicon glyphicon-eye-open"></span>View Questions</a></li>
                 <li><a href="changepwd.php"><span style="padding-right:5px;" class="glyphicon glyphicon-lock"></span>Change Password</a></li>
                 <li><a href="logout.php"><span style="padding-right:5px;" class="glyphicon glyphicon-off"></span>Logout</a></li>
          </ul>
         
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Management Print</h1>

            <div id="container" align="center"><center>

</center>
<div id="page" style="margin-top:5px">
<div class="col-md-10 col-md-offset-2 col-xs-10">
    <div class="panel panel-info">
      <div class="panel-heading"><i class="fa fa-printer"></i>    Print Result</div>
      <div class="panel-body">
 <form action="print.php" class="form-horizontal" method="post" id="login-form" enctype="multipart/form-data" name="f1" data-toggle="validator">
  <div class="form-group">
    <label for="adminid" class="col-sm-4 control-label">Candidate Exam Code</label>
    <div class="col-sm-8">
      <input type="password" class="form-control" id="code" name="code" placeholder="Exam Code" required>
    </div>
  </div>
 
  <div id="message"></div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" id="changepwd" class="btn btn-success">Proceed To Print</button>
    </div>
  </div>
</form>
      </div>
    </div>
   
   </div>
</div>
</div>
            
          
           
          
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/jQuery-2.1.4.min.js"></script>
    <script src="../js/validator.js"></script>
    <!-- Bootstrap 3.3.5 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
 <script>
 $(document).ready(function () {
	 document.getElementById('oldpwd').value='';
	 $('#qimg').hide();
	 $('#chk').click(function(){
		 $('#qimg').slideDown();
		 });
 });
 $(document).ready(function () {
            $("#mar").keypress(function (e) {
                if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    $(this).closest('tr').find($("#errmsg")).html("Digits Only").show().fadeOut("slow");
                    return false;
                }
			});
 });
 /*Question*/
 $(document).on('click', '#addquestion', function(e){
	var validator = $("#question").data("bs.validator");
	validator.validate();
	 e.preventDefault();
 if (!validator.hasErrors()) 
  {
	 var $this=$(this);
	 $this.button('Adding Question');		
	$("#message").empty();
	var formData = new FormData($('#question')[0]);
	$.ajax({
	url: "questioninsert.php", 
	type: "POST",             
	data: formData, 
	contentType: false,       
	cache: false,   
	dataType: "JSON",          
	processData:false, 
	    
	success: function(responsedata)   
	{	
		if(responsedata.status=='success')
		{
		setTimeout(function(){$this.button('reset');},3000);
		$("#message").fadeIn(4000).html('<div class="alert alert-success"><span class="glyphicon glyphicon-ok-sign pull-left"></span>&nbsp;&nbsp;'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
		$("#message").fadeOut(6000).html('<div class="alert alert-success"><span class="glyphicon glyphicon-ok-sign pull-left"></span>&nbsp;&nbsp;'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
		document.getElementById('quest').value='';
		document.getElementById('opta').value='';
		document.getElementById('optb').value='';
		document.getElementById('optc').value='';
		document.getElementById('optd').value='';
		document.getElementById('correct').value='';
		document.getElementById('profileImg').value='';
		
		}else
		{
		setTimeout(function(){$this.button('reset');},3000);
		$("#message").fadeIn(4000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
		$("#message").fadeOut(5000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
		}	
		
		
	},
	error:function(responsendata)
	{
		setTimeout(function(){$this.button('reset');},3000);
		$("#message").fadeIn(4000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
		$("#message").fadeOut(5000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
	}
});
return false;
		 }
		 else
		 {
			 setTimeout(function(){$this.button('reset');},3000);
		$("#message").fadeIn(4000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
		$("#message").fadeOut(5000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
		 }
});
/*Question ends*/
 </script>  
  

</body></html>