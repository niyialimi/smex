<?php
session_start();
require_once('../Connections/examcon.php');
$phn=mysqli_real_escape_string($iqcon,ucfirst($_POST['phn']));
$em=mysqli_real_escape_string($iqcon,ucfirst($_POST['em']));
$examscore=0;
$desiredexam=mysqli_real_escape_string($iqcon,ucfirst($_POST['desire']));
$examstatus=false;
$examcode=mt_rand(000000000, 999999999);
$logsql="select * from register where email='$em'";
$result=mysqli_query($iqcon,$logsql);
if (mysqli_num_rows($result))
{
	echo "<script type=text/javascript>alert('Sorry, The Username ALready Exist or email already in use');</script>";
	echo "<script type=text/javascript>window.location='reg.php'</script>";
}else
{
	$sql="INSERT INTO register (firstname,lastname,phone,email,desiredexam,examcode,date,examscore,examstatus) VALUES ('$_POST[fname]','$_POST[lname]','$_POST[phn]',
	'$_POST[em]','$_POST[desire]','$examcode','$_POST[dat]','$examscore','$examstatus')";
	if(mysqli_query($iqcon,$sql))
	{
		$response['status'] = 'success';  
		$response['message'] = 'New Student Added';  
		header('Content-type: application/json'); 							
		echo json_encode($response);
		
	}
	else
	{
		die('Error : ' . mysqli_error($iqcon));
		
	}
}
?>
