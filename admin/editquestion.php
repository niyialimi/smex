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
	$qid=mysqli_real_escape_string($iqcon,$_POST['qid']);
	//echo $qid;
	$catname=mysqli_real_escape_string($iqcon,$_POST['catname']);
	$subjt=mysqli_real_escape_string($iqcon,$_POST['subjt']);
	$quest=mysqli_real_escape_string($iqcon,$_POST['quest']);
	$opta=mysqli_real_escape_string($iqcon,$_POST['opta']);
	$optb=mysqli_real_escape_string($iqcon,$_POST['optb']);
	$optc=mysqli_real_escape_string($iqcon,$_POST['optc']);
	$optd=mysqli_real_escape_string($iqcon,$_POST['optd']);
	$correct=mysqli_real_escape_string($iqcon,$_POST['correct']);
	$mar=mysqli_real_escape_string($iqcon,$_POST['mar']);
	$upto2="update qtable set category='$catname',subject='$subjt',question='$quest',optiona='$opta',optionb='$optb',optionc='$optc',optiond='$optd',correctoption='$correct',mark='$mar'  where qid='$qid'";
		$result=mysqli_query($iqcon,$upto2);
		
		if($result)
		{
			$response['status'] = 'success';  
			$response['message'] = 'Question Edited';  
			header('Content-type: application/json'); 							
			echo json_encode($response);
		}
		else
		{
			$response['status'] = 'error';  
			$response['message'] = 'Question Cannot Be Edited, Please Try Again';  
			header('Content-type: application/json'); 							
			echo json_encode($response);
		}
}
?>
