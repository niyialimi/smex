<?php
require_once('admin/Connections/examcon.php');
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
<title>SMEX RESULT</title>
<link href="css/userstyle.css" rel="stylesheet" type="text/css" media="screen">
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="screen">
<link rel="shortcut icon" href="image/logo.png">
</head>

<body>
<div id="container" align="center" style="margin-top:10%;">

<div id="display">
<center><font size="+2"><?php 

echo "Exam Code: ".$_SESSION['examcode'];

?></font></center>
</div>
<div id="page">
<form action="newexam.php" style="width:40%; margin-left:7%;">
  <fieldset class="style4"><legend class="style3 style4"></legend>
  
<div class="panel panel-info">
      <div class="panel-heading"><i class="fa fa-key"></i>    <?php echo "Name: ". $_SESSION['firstname']." ".$_SESSION['lastname'] ?></div>
      <div class="panel-body">
      <div align="center"><h3>Your Exam Has Been Submitted, Thank you</h3></div>
      <!--table width="70%" height="104" class="table table-striped table-bordered" id="tab">
<thead>
  <tr style="font-weight:bolder;">
  	<td width="6%">S/N</td>    
    <td width="12%">Subject</td>
    <td width="9%">Score</td>
    
  </tr>
</thead>
<tbody>

        <?php 
		$sn=1;$total=0;
			//echo "Total Percentage= ".(round(($mark/$rowCount)*100))."%"; 
			$resel="select * from scoretab where exam_code='".$_SESSION['examcode']."' and exam_type='".$_SESSION['desiredexam']."' ";
			$resultn=mysqli_query($iqcon,$resel);
				if (mysqli_num_rows($resultn))
				{
					while($rows=mysqli_fetch_assoc($resultn))
					{
						$total=$total+$rows['exam_score'];
			?>
            <tr>
            <td><?php echo $sn; ?></td>
            <td><?php echo $rows['exam_subject']; ?></td>
   			 <td><?php echo $rows['exam_score']; ?></td>
              </tr>
            <?php 
			$sn++;			
					}
				}

		
		?>
<tr><td align="right" colspan="2"><strong>Total</strong></td>
<td><?php echo $total; ?></td></tr>
 </tbody>
 </table-->
        <div class="form-group">
    <div class="col-sm-offset-2 col-sm-6">
      <button type="submit" class="btn btn-success">Take New Exam</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="script/logout.php" class="btn btn-danger">Logout</a>
      <!--button type="button" class="btn btn-success">Print Result</button-->
      
    </div>
  </div>
      </div>
            
    </div>
     
</fieldset>
</form>
</div>
</div>
<script src="js/jQuery-2.1.4.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
