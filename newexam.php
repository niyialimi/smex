<?php
require_once('Connections/examcon.php');
session_start();

if (!isset ($_SESSION['examcode']) && !isset( $_SESSION['email']))
{
	header("Location:index.php");
	exit();
}
$logsql="select * from register where email='$_SESSION[email]' ";
//$logsql="select * from register where email='$em' ";
$result=mysqli_query($iqcon,$logsql);
if (mysqli_num_rows($result))
	{
		while($rows=mysqli_fetch_assoc($result))
		{
			//echo $rows['useremail']."  ".$rows['password'];
			
			$_SESSION['email']=$rows['email'];
		
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

<body style="background-image:url(image/exambak1.jpg);">
<div id="logincontainer">
  <div class="row logincontent">
  <div class="col-md-4 col-md-offset-4 col-xs-10 col-xs-offset-1">
    <div class="panel panel-info">
      <div class="panel-heading"><i class="fa fa-key"></i>    Select Subject</div>
      <div class="panel-body">
       <form action="instruction.php" method="post" enctype="multipart/form-data" name="f1" role="form" data-toggle="validator">
  <table width="70%"  border="0" align="center">
    <tr>
      <!--td width="29%"><span class="style2">Exam Type</span></td-->
      <td width="71%" colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="form-control" type="hidden" name="desiredexam" id="desiredexam" data-error="Field can't be empty" value="<?php echo $_SESSION['desiredexam']; ?>" readonly>
      </td>
    </tr>
   
   
   
    <tr>
      <td class="style2">Select Subject </td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="subject" class="form-control" id="subject" required>
	<option value="">Select Subject</option>
	<option value="Mathematics">Mathematics</option>
    <option value="English">English</option>
    <option value="Chemistry">Chemistry</option>
    <option value="Biology">Biology</option>
    <option value="Physics">Physics</option>
    <option value="Agric Science">Agric Science</option>
	
    </select>
      </td>
    </tr>
   
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
   
  </table>
  <!--?php $examcode=mt_rand(000000000, 999999999);echo $examcode;?-->
   <div class="col-sm-offset-4 col-sm-10">
      <button type="submit" class="btn btn-success">Proceed</button>
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
<div align="center" class="loginfooter">SMEX by <img src="image/Main-Logo-small.png" width="127" height="50" /> For Atanda CBT Center</div>
<script src="js/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
   
</body>
</html>