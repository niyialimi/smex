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

    <title>SMEX Question</title>

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
          <h1 class="page-header">Edit Candidate Data</h1>

            <div id="container" align="center"><center>

</center>
<div id="page">
  
<div id="table">
<?php 
 $regid=$_GET['regid']; //echo $id;
 $logsql="select * from register where regid='$regid' ";
	
	$result=mysqli_query($iqcon,$logsql);
	if (mysqli_num_rows($result))
	{
		while($rows=mysqli_fetch_assoc($result))
		{
			
?>
<form action="" method="post" enctype="multipart/form-data" id="cedit-form" role="form" data-toggle="validator">
<input type="hidden" name="regid" value="<?php echo $regid; ?>">
<table width="66%"  border="0" align="center">
  <tr>
    <td width="33%">FirstName</td>
    <td width="67%"><div style="margin-bottom:4%;"><input type="text" name="fname" class="form-control" value="<?php echo $rows['firstname']; ?>" data-error="Field can't be empty" placeholder="Max 150 character" required></div></td>
  </tr>
  <tr>
    <td>Lastname</td>
    <td><div style="margin-bottom:4%;"><input type="text" name="lname" class="form-control" value="<?php echo $rows['lastname']; ?>" data-error="Field can't be empty" placeholder="Max 150 character" required></div></td>
  </tr>
  <tr>
    <td>Phone</td>
    <td><div style="margin-bottom:4%;"><input type="text" name="phn" class="form-control" value="<?php echo $rows['Phone']; ?>" data-error="Field can't be empty" placeholder="Max 150 character" required></div></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><div style="margin-bottom:4%;"><input type="text" name="em" class="form-control" value="<?php echo $rows['email']; ?>" data-error="Field can't be empty" placeholder="Max 150 character" required></div></td>
  </tr>
  
  <tr>
    <td>Desired Exam</td>
    <td>
    <select name="desire" id="desire" class="form-control" required>
    <option value="<?php echo $rows['desiredexam']; ?>"><?php echo $rows['desiredexam']; ?></option>
    <?php
	$logsql="select * from categorytab";
	$result=mysqli_query($iqcon,$logsql);
	if (mysqli_num_rows($result))
	{
	
		while($rows=mysqli_fetch_assoc($result))
		{
			echo '<option value="'.$rows['cat_name'].'">'.$rows['cat_name'].'</option>';
		}
	}
	?>
	
    </select>
    
    </td>
  </tr>
 
  <!--tr>
    <td>Category</td>
    <td><select name="sel1" class="form-control">
	
	<option value="Project Management">Project Management</option>
	
    </select></td>
  </tr-->
  <tr><td colspan="2">&nbsp;</td></tr>
   <tr>
      <td colspan="2"><div id="message"></div></td>
    </tr>
</table>
<div class="col-sm-offset-2 col-sm-10">
      <button type="submit" id="editcand" class="btn btn-success">Save Data</button>
    </div>
</form>
<?php
		}
	}
?>
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
 /*Question*/
 $(document).on('click', '#editcand', function(e){
	var validator = $("#cedit-form").data("bs.validator");
	validator.validate();
	 e.preventDefault();
 if (!validator.hasErrors()) 
  {
	 var $this=$(this);
	 $this.button('Adding Question');		
	$("#message").empty();
	var formData = new FormData($('#cedit-form')[0]);
	$.ajax({
	url: "editcandidate.php", 
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
		
		
		}else
		{
		$("#message").fadeIn(4000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
		
		}	
		
		
	},
	error:function(responsendata)
	{
		$("#message").fadeIn(4000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
		
	}
});
return false;
		 }
		 else
		 {
		$("#message").fadeIn(4000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
		
		 }
});
/*Question ends*/
 </script>   
  

</body></html>