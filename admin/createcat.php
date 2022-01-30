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

    <title>SMEX Create Exam Type</title>

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
          <a class="navbar-brand" href="#">SmartExam</a>
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
                <li><a href="reg.php"><span style="padding-right:5px;" class="glyphicon glyphicon-user"></span>Add Candidtae</a></li>
                <li><a href="viewcand.php"><span style="padding-right:5px;" class="glyphicon glyphicon-eye-open"></span>View Candidates</a></li>
                <li><a href="createcat.php"><span style="padding-right:5px;" class="glyphicon glyphicon-pencil"></span>Add Exam Category</a></li>
                 <li><a href="questionpage.php"><span style="padding-right:5px;" class="glyphicon glyphicon-pencil"></span>Add Question</a></li>
                 <li><a href="viewquest.php"><span style="padding-right:5px;" class="glyphicon glyphicon-eye-open"></span>View Questions</a></li>
                 <li><a href="changepwd.php"><span style="padding-right:5px;" class="glyphicon glyphicon-lock"></span>Change Password</a></li>
                 <li><a href="logout.php"><span style="padding-right:5px;" class="glyphicon glyphicon-off"></span>Logout</a></li>
          </ul>
         
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Add Exam Category</h1>

            <div id="container" align="center"><center>

</center>
<div id="page">
  
<div id="table">
<form action="" method="post" id="cat-form" enctype="multipart/form-data" role="form" data-toggle="validator">
<table width="66%"  border="0" align="center">  
  
  <tr>
    <td>Category</td>
    <td><select name="catname" class="form-control" id="catname" data-error="Field can't be empty" required>
	<option value="">Select</option>
	<option value="JAMB">JAMB</option>
    <option value="WAEC">WAEC</option>
    <option value="GCE">GCE</option>
    <option value="NECO">NECO</option>
    <option value="NECO GCE">NECO GCE</option>
	
    </select>
    <div class="help-block with-errors"></div>
    </td>
  </tr>
  <tr>
    <td>Duration</td>
    <td><input type="Number" name="dur" id="dur" class="form-control" data-error="Field can't be empty" required><span id="errmsg"></span>
    <div class="help-block with-errors"></div>
    </td>
  </tr>
   <tr><td colspan="2"><div id="message"></div></td></tr>
</table>
<p>
<div class="col-sm-offset-2 col-sm-10">
      <button type="submit" id="addcat" class="btn btn-success">Add Category</button>
    </div>
    </p>
</form>

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
            $("#dur").keypress(function (e) {
                if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    $(this).closest('tr').find($("#errmsg")).html("Digits Only").show().fadeOut("slow");
                    return false;
                }
			});
 });
 
 /*Category*/
 $(document).on('click', '#addcat', function(e){
	 
	var validator = $("#cat-form").data("bs.validator");
	validator.validate();
	 e.preventDefault();
	 var catname=$('#catname').val();
	 var dur=$('#dur').val();

 if (catname=='') 
 {
	 $("#message").fadeIn(4000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;Select Exam Category<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
		
 }else if (dur=='') 
 {
	  $("#message").fadeIn(4000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;Input Exam Time<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
 }
 else {
		
	$("#message").empty();
	var formData = new FormData($('#cat-form')[0]);
	$.ajax({
	url: "catinsert.php", 
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
		
		$("#message").fadeIn(4000).html('<div class="alert alert-success"><span class="glyphicon glyphicon-ok-sign pull-left"></span>&nbsp;&nbsp;'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
		$("#message").fadeOut(6000).html('<div class="alert alert-success"><span class="glyphicon glyphicon-ok-sign pull-left"></span>&nbsp;&nbsp;'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
		document.getElementById('dur').value='';
		document.getElementById('catname').value='';
		
		
		}else
		{
		$("#message").fadeIn(4000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
		$("#message").fadeOut(5000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
		}	
		
		
	},
	error:function(responsendata)
	{
		$("#message").fadeIn(4000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
		$("#message").fadeOut(5000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
	}
});
return false;
		 }
		
});
/*Category ends*/
 </script>
  

</body></html>