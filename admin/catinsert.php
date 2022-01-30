<?php
require_once('../Connections/examcon.php');
$catname=mysqli_real_escape_string($iqcon,$_POST['catname']);
$dur=mysqli_real_escape_string($iqcon,$_POST['dur']);
	$logsql="select * from categorytab where cat_name='$catname'";
	$result=mysqli_query($iqcon,$logsql);
	if($result)
	{
			$response['status'] = 'error';  
			$response['message'] = 'Category Exist Already';  
			header('Content-type: application/json'); 							
			echo json_encode($response);
	}
	else
	{
		//mysqli_select_db($iqcon,"cbt_db");
		$sql="INSERT INTO categorytab (cat_name,cat_duration) VALUES ('$catname','$dur')";
		if(mysqli_query($iqcon,$sql))
		{
			$response['status'] = 'success';  
			$response['message'] = 'New Category Created';  
			header('Content-type: application/json'); 							
			echo json_encode($response);
		}
		else
		{
			
			die('Error : ' . mysqli_error($iqcon));
		}
	}
?>
