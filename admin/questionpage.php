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

    <title>SMEX Add Question</title>

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
          <h1 class="page-header">Add Question</h1>

            <div id="container" align="center"><center>

</center>
<div id="page">
  
<div id="table">
<form action="" method="post" id="question" enctype="multipart/form-data" role="form" data-toggle="validator">
<table width="66%"  border="0" align="center">
<tr>
    <td>Category</td>
    
    <td><div style="margin-bottom:4%;"><select name="catname" id="catname" class="form-control" required>
    <option value="">Select</option>
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
	
    </select></div></td>
  </tr>
  
  <tr>
    <td>Subject</td>
    <td><select name="subjt" id="subjt" class="form-control" required>
    <option value="">Select</option>
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
    
    
	
    </select></td>
  </tr>
  <tr><td>&nbsp;</td><td><div style="margin-bottom:4%;">Question Has Image(Maximum size is 100kb)  <input type="checkbox" name="chk" id="chk"><br>
  <div id="qimg"><input type="file" name="profileImg" id="profileImg"></div></div></td>
  </tr>
  <tr>
    <td width="33%">Question</td>
    <td width="67%"><div style="margin-bottom:4%;"><textarea name="quest" id="quest" cols="50" rows="5" class="form-control" data-error="Field can't be empty" placeholder="Max 500 character" required></textarea></div></td>
  </tr>
  <tr>
    <td>Option A </td>
    <td><div style="margin-bottom:4%;"><input type="text" name="opta" id="opta" class="form-control" data-error="Field can't be empty" placeholder="Max 150 character" required></div></td>
  </tr>
  <tr>
    <td>Option B </td>
    <td><div style="margin-bottom:4%;"><input type="text" name="optb" id="optb" class="form-control" data-error="Field can't be empty" placeholder="Max 150 character" required></div></td>
  </tr>
  <tr>
    <td>Option C </td>
    <td><div style="margin-bottom:4%;"><input type="text" name="optc" id="optc" class="form-control" data-error="Field can't be empty" placeholder="Max 150 character" required></div></td>
  </tr>
  <tr>
    <td>Option D </td>
    <td><div style="margin-bottom:4%;"><input type="text" name="optd" id="optd" class="form-control" data-error="Field can't be empty" placeholder="Max 150 character" required></div></td>
  </tr>
 
  <tr>
    <td>Correct Option </td>
    <td><div style="margin-bottom:4%;"><input type="text" name="correct" id="correct" class="form-control" data-error="Field can't be empty" placeholder="e.g A or B. etc" required></div></td>
  </tr>
  <tr>
    <td>Mark</td>
    <td><div style="margin-bottom:4%;"><input type="text" name="mar" id="mar" class="form-control" data-error="Field can't be empty" required><span id="errmsg"></span></div></td>
  </tr>
  <tr><td colspan="2"><div id="message"></div></td></tr>
</table>
<p>

<div class="col-sm-offset-2 col-sm-10">
      <button type="submit" id="addquestion" class="btn btn-success">Add Question</button>
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
 var catname=$('#catname').val();var subjt=$('#subjt').val();var quest=$('#quest').val();var opta=$('#opta').val();var optb=$('#optb').val();
 optc=$('#optc').val();optd=$('#optd').val();optb=$('#optb').val();correct=$('#correct').val();mar=$('#mar').val();
	 if(catname=='' )
	 {
		 $("#message").fadeIn(400).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;Select Category<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
	 }
	else if(subjt=='' )
	 {
		 $("#message").fadeIn(400).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;Select Subject<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
	 }
	 else if(quest=='' )
	 {
		 $("#message").fadeIn(400).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;Question Cant Be Empty<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
	 }
	 else if(opta=='' )
	 {
		 $("#message").fadeIn(400).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;Option A is Still Empty<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
	 }
	 else if(optb=='' )
	 {
		 $("#message").fadeIn(400).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;Option B is Still Empty<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
	 }
	  else if(optc=='' )
	 {
		 $("#message").fadeIn(400).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;Option C is Still Empty<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
	 }
	  else if(optd=='' )
	 {
		 $("#message").fadeIn(400).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;Option D is Still Empty<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
	 }
	  else if(correct=='' )
	 {
		 $("#message").fadeIn(400).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;Correct Option is Still Empty<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
	 }
	  else if(mar=='' )
	 {
		 $("#message").fadeIn(400).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;Please Input A Mark<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
	 }
 else
  {
		
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
		 
});
/*Question ends*/
 </script>  
  

</body></html>