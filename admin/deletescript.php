<?php
require_once('../Connections/examcon.php');
$qid=$_GET["qid"];
$dquery = "delete from qtable where qid='$qid' ";
 $result = mysqli_query($iqcon,$dquery) or die(mysqli_error($iqcon));
 if($result)
 {
	 //echo 'deleted';
	 echo "<script type=text/javascript>alert('Question Deleted');</script>";
	echo "<script type=text/javascript>window.location='viewquest.php'</script>";
 
 }else
 {
	  echo "<script type=text/javascript>alert('Question Could Not Deleted, Please Try Again');</script>";
	echo "<script type=text/javascript>window.location='viewquest.php'</script>";
 }
?>