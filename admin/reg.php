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

    <title>SMEX Registration</title>

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
          <h1 class="page-header">Add Candidate</h1>

    <div id="container" align="center"><center>

</center>
<div id="page">
  
<div align="center">
<form action="" method="post" enctype="multipart/form-data" id="student-form" name="f1" role="form" data-toggle="validator">
  <table width="70%"  border="0" align="center">
    <tr>
      <td width="29%"><span class="style2">Firstname</span></td>
      <td width="71%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="form-control" type="text" name="fname" id="fname" data-error="Field can't be empty" required>
      *</td>
    </tr>
    <tr>
      <td class="style2">Lastname</td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="lname" id="lname" class="form-control" data-error="Field can't be empty" required>
      *</td>
    </tr>
    <tr>
      <td class="style2">Phone</td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="phn" id="phn" class="form-control" data-error="Field can't be empty">
      *</td>
    </tr>
    <tr>
      <td class="style2">E-mail</td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="email" name="em" id="em" class="form-control" data-error="Field can't be empty" required>
      *</td>
    </tr>
    
    <tr>
      <td class="style2">Desired Exam </td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="desire" id="desire" class="form-control" required>
    <option value="">Select</option>
   <option value="JAMB">JAMB</option>
    <option value="WAEC">WAEC</option>
    <option value="GCE">GCE</option>
    <option value="NECO">NECO</option>
    <option value="NECO GCE">NECO GCE</option>
	
    </select>
      *</td>
    </tr>
    <tr>
      <td class="style2">Date</td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="dat" id="dat" class="form-control" value=<?php echo date("Y-m-d")?> readonly="true">
      *</td>
    </tr>
    <tr>
      <td colspan="2"><div id="message"></div></td>
    </tr>
   
  </table>
  <!--?php $examcode=mt_rand(000000000, 999999999);echo $examcode;?-->
   <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" id="addstudent" class="btn btn-success">Add Student</button>
    </div>
</form>
<p>&nbsp;</p>
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
/*student*/
 $(document).on('click', '#addstudent', function(e){	 
	var validator = $("#student-form").data("bs.validator");
	validator.validate();
	 e.preventDefault();
	 var fname=$('#fname').val();var lname=$('#lname').val();var phn=$('#phn').val();var em=$('#em').val();var desire=$('#desire').val();
	 if(fname=='' )
	 {
		 $("#message").fadeIn(400).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;Firstname Cannot Be Empty<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
	 }
	else if(lname=='' )
	 {
		 $("#message").fadeIn(400).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;Lastname Cannot Be Empty<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
	 }
	 else if(phn=='' )
	 {
		 $("#message").fadeIn(400).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;Phone Number Cannot Be Empty<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
	 }
	 else if(em=='' )
	 {
		 $("#message").fadeIn(400).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;Email Cannot Be Empty<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
	 }
	 else if(desire=='' )
	 {
		 $("#message").fadeIn(400).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;Select Exam Category for Student<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
	 }
else 
  {
	
	$("#message").empty();
	var formData = new FormData($('#student-form')[0]);
	$.ajax({
	url: "reginsert.php", 
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
		
		$("#message").fadeIn(400).html('<div class="alert alert-success"><span class="glyphicon glyphicon-ok-sign pull-left"></span>&nbsp;&nbsp;'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
		document.getElementById('lname').value='';
		document.getElementById('fname').value='';
		document.getElementById('em').value='';
		document.getElementById('phn').value='';
		
		}else
		{
		
		$("#message").fadeIn(400).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
		
		}	
		
		
	},
	error:function(responsendata)
	{
		
		$("#message").fadeIn(400).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
	}
});
return false;
		 }
		
});
/*new student ends*/
</script>

</body></html>