<?php
session_start();
require_once('../Connections/examcon.php');
$update="update register set Phone='$_POST[phn]',occupation='$_POST[occ]', desiredexam='$_POST[desire]' where regid='$_SESSION[regid]'";
	//$update="update sms_emptab set emp_lname='$lname' where emp_id='$empid'";
	$result2=mysqli_query($iqcon,$update);
		if($result2)
		{
			echo "<script type=text/javascript>alert('Exam Setup Ready For Candidate');</script>";
			echo "<script type=text/javascript>window.location='../instruction.php'</script>";;
		}else {
				echo "<script type=text/javascript>alert('Cannot Update details; Please check your input');</script>";
				echo "<script type=text/javascript>window.location='../complete.php'</script>";
			}
   // }
?>