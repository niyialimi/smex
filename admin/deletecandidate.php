<?php
require_once('../Connections/examcon.php');
$regid=$_GET["regid"];
$dquery = "delete from register where regid='$regid' ";
 $result = mysqli_query($iqcon,$dquery) or die(mysqli_error($iqcon));
 if($result)
 {
	 //echo 'deleted';
	 echo "<script type=text/javascript>alert('Candidate Deleted Succesfully');</script>";
	echo "<script type=text/javascript>window.location='viewcand.php'</script>";
 
 }else
 {
	  echo "<script type=text/javascript>alert('Candidate Could Not Deleted, Please Try Again');</script>";
	echo "<script type=text/javascript>window.location='viewcand.php'</script>";
 }
?>