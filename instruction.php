<?php
require_once('Connections/examcon.php');
session_start();

if (!isset ($_SESSION['examcode']) && !isset( $_SESSION['email']))
{
	header("Location:index.php");
	exit();
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>SMEX</title>
<link href="css/userstyle.css" rel="stylesheet" type="text/css" media="screen">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/font-awesome/css/font-awesome.min.css">
    <link rel="shortcut icon" href="image/logo.png">
</head>

<body style="background-image:url(image/exambak1.jpg); color:#900; font-size:24px;">
<div id="container" align="center">
<img src="image/Main-Logo-small.png" width="144" height="46">
<div id="page">
  <center>
</center>
<div id="table">
<form action="test.php" method="post" enctype="multipart/form-data">
<table width="80%"  border="0" align="center">
  <tr>
    <td><p align="center" class="style6">INSTRUCTIONS</p>
      <p> PLEASE READ THE FOLLOWING INSTRUCTIONS CAREFULLY  BEFORE CLICKING ON THE START BUTTON.
    ONCE YOU CLICK THE START BUTTON. THE TIMER FOR THE QUESTION STARTS RUNNING AND THE QUESTION WILL BE SUBMITTED TO THE SERVER AUTOMATICALLY ONCE THE TIME IS UP.</p>
      <p>The question you are about to answer includes various Subjects, with a total of 50 questions.      </p>
      <p>NB. The Test is a question per page. Once you click on the Next Button, you Should not click on the browser back arrow button for any reason because if you do so the system will submit the exam to the server.</p>
     
      <p>When you are through with the test, click on  the Submit button to Send your answers to the server.          </p>
      <p>Good luck. </p></td>
  </tr>
  <tr>
  <input type="hidden" name="subject" id="subject" value="<?php echo $_POST['subject']; ?>" >
  <input type="hidden" name="desiredexam" id="desiredexam" value="<?php echo $_POST['desiredexam']; ?>" >
    <td align="center"><input type="submit" name="Submit" value="START TEST" class="btn btn-primary"><input type="hidden" value=<?php echo $_SESSION['regid']?>></td>
  </tr>
</table>
</form>
</div>
</div>
</div>
</div>
<div align="center" class="loginfooter" style="font-size:14px; color:#000; margin-top:15%;">SMEX by <img src="image/Main-Logo-small.png" width="127" height="50" /> For Atanda CBT Center</div>
 <script src="js/jQuery-2.1.4.min.js"></script>
    <script src="js/validator.js"></script>
    <!-- Bootstrap 3.3.5 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
    
</body>
</html>
