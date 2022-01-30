<?php 
require_once('../Connections/examcon.php');
session_start();
//mysqli_select_db($iqcon,"cbt_db");
if (!isset ($_SESSION['username']) && !isset( $_SESSION['password']))
{
	header("Location:index.php");
	exit();
}else
{
	$regid=mysqli_real_escape_string($iqcon,$_POST['regid']);
	//echo $qid;
	$fname=mysqli_real_escape_string($iqcon,$_POST['fname']);
	$lname=mysqli_real_escape_string($iqcon,$_POST['lname']);
	$phn=mysqli_real_escape_string($iqcon,$_POST['phn']);
	$em=mysqli_real_escape_string($iqcon,$_POST['em']);
	$desire=mysqli_real_escape_string($iqcon,$_POST['desire']);
	$upto2="update register set firstname='$fname',lastname='$lname',Phone='$phn',email='$em',desiredexam='$desire'  where regid='$regid'";
		$result=mysqli_query($iqcon,$upto2);
		
		if($result)
		{
			$response['status'] = 'success';  
			$response['message'] = 'Candidate Data Edited';  
			header('Content-type: application/json'); 							
			echo json_encode($response);
		}
		else
		{
			$response['status'] = 'error';  
			$response['message'] = 'Candidate Data Cannot Be Edited, Please Try Again';  
			header('Content-type: application/json'); 							
			echo json_encode($response);
		}
}
?>
