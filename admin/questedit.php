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
          <h1 class="page-header">Edit Question(s)</h1>

            <div id="container" align="center"><center>

</center>
<div id="page">
  
<div id="table">
<?php 
 $id=$_GET['id']; //echo $id;
 $logsql="select * from qtable where qid='$id' ";
	
	$result=mysqli_query($iqcon,$logsql);
	if (mysqli_num_rows($result))
	{
		while($rows=mysqli_fetch_assoc($result))
		{
			$_SESSION['category']=$rows['category'];
		    $_SESSION['qid']=$rows['qid'];
			$_SESSION['subject']=$rows['subject'];
?>
<form action="" method="post" enctype="multipart/form-data" id="qedit-form" role="form" data-toggle="validator">
<input type="hidden" name="qid" value="<?php echo $id; ?>">
<table width="66%"  border="0" align="center">
<tr>
<td>Category</td>
<td>
	<div style="margin-bottom:4%;"><select class="form-control form-control-lg" name="catname" id="catname">
                            <?php
												 echo '<option value="'.$_SESSION['category'].'" selected>'.$_SESSION['category'].'</option>
													<option value="JAMB">JAMB</option>
													<option value="WAEC">WAEC</option>
													<option value="GCE">GCE</option>
													<option value="NECO">NECO</option>
													<option value="NECO GCE">NECO GCE</option>
												 ';
											
							?>
                            </select></div>
</td>
</tr>
<tr>
<td>Subject</td>
<td>
	<div style="margin-bottom:4%;"><select class="form-control form-control-lg" name="subjt" id="subjt">
                            <?php
												 echo '<option value="'.$_SESSION['subject'].'" selected>'.$_SESSION['subject'].'</option>
												<option value="Accounts">Accounts</option>
												<option value="Agric Science">Agric Science</option>
												<option value="Biology">Biology</option>
												<option value="Chemistry">Chemistry</option>
												<option value="Christian Religious Studies">Christian Religious Studies</option>
												<option value="Commerce">Commerce</option>
												<option value="Civic Education">Civic Education</option>    
												<option value="English">English</option>  
												<option value="Financial Accounting">Financial Accounting</option>
												<option value="Further Mathematics">Further Mathematics</option>
												<option value="Geography">Geography</option>
												<option value="Government">Government</option>
												<option value="Hausa">Hausa</option>
												<option value="History">History</option>
												<option value="Igbo">Igbo</option>
												<option value="Islamic Studies">Islamic Studies</option>
												<option value="Literature in English">Literature in English</option>
												<option value="Mathematics">Mathematics</option>
												<option value="Physics">Physics</option>
												<option value="Yoruba">Yoruba</option>
												 ';
											
							?>
                            </select></div>
</td>
</tr>
  <tr>
    <td width="33%">Question</td>
    <td width="67%"><div style="margin-bottom:4%;"><textarea cols="50" rows="5" class="form-control" data-error="Field can't be empty" placeholder="Max 500 character" name="quest" required><?php echo $rows['question']; ?></textarea></td></td>
  </tr>
  <tr>
    <td>Option A </td>
    <td><div style="margin-bottom:4%;"><input type="text" name="opta" class="form-control" value="<?php echo $rows['optiona']; ?>" data-error="Field can't be empty" placeholder="Max 150 character" required></div></td>
  </tr>
  <tr>
    <td>Option B </td>
    <td><div style="margin-bottom:4%;"><input type="text" name="optb" class="form-control" value="<?php echo $rows['optionb']; ?>" data-error="Field can't be empty" placeholder="Max 150 character" required></div></td>
  </tr>
  <tr>
    <td>Option C </td>
    <td><div style="margin-bottom:4%;"><input type="text" name="optc" class="form-control" value="<?php echo $rows['optionc']; ?>" data-error="Field can't be empty" placeholder="Max 150 character" required></div></td>
  </tr>
  <tr>
    <td>Option D </td>
    <td><div style="margin-bottom:4%;"><input type="text" name="optd" class="form-control" value="<?php echo $rows['optiond']; ?>" data-error="Field can't be empty" placeholder="Max 150 character" required></div></td>
  </tr>
  
  <tr>
    <td>Correct Option </td>
    <td><div style="margin-bottom:4%;"><input type="text" name="correct" class="form-control" value="<?php echo $rows['correctoption']; ?>" data-error="Field can't be empty" placeholder="e.g A or B. etc" required></div></td>
  </tr>
  <tr>
    <td>Mark</td>
    <td><div style="margin-bottom:4%;"><input type="text" name="mar" class="form-control" value="<?php echo $rows['mark']; ?>" data-error="Field can't be empty" required></div></td>
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
      <button type="submit" id="editquestion" class="btn btn-success">Save Question</button>
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
  

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/jQuery-2.1.4.min.js"></script>
    <script src="../js/validator.js"></script>
    <!-- Bootstrap 3.3.5 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
 <script>
 /*Question*/
 $(document).on('click', '#editquestion', function(e){
	 
	var validator = $("#qedit-form").data("bs.validator");
	validator.validate();
	 e.preventDefault();
 if (!validator.hasErrors()) 
  {
	 var $this=$(this);
	 $this.button('Adding Question');		
	$("#message").empty();
	var formData = new FormData($('#qedit-form')[0]);
	$.ajax({
	url: "editquestion.php", 
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