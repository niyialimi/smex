<?php
session_start();
require_once('../Connections/examcon.php');
//mysqli_select_db($iqcon,"cbt_db");
//$canduname=mysqli_real_escape_string($iqcon,$_POST['canduname']);
$examcode=mysqli_real_escape_string($iqcon,$_POST['examcode']);

if($examcode )
{
	
	$logsql="select * from register where examcode='$examcode'";
	$result=mysqli_query($iqcon,$logsql);
	if (mysqli_num_rows($result))
	{
		while($rows=mysqli_fetch_assoc($result))
		{
			//echo $rows['useremail']."  ".$rows['password'];
			
			$_SESSION['email']=$rows['email'];
			$_SESSION['examcode']=$rows['examcode'];
			$_SESSION['regid']=$rows['regid'];
			$_SESSION['phone']=$rows['Phone'];
			$_SESSION['examstatus']=$rows['examstatus'];
			$_SESSION['firstname']=$rows['firstname'];
			$_SESSION['lastname']=$rows['lastname'];
			$_SESSION['desiredexam']=$rows['desiredexam'];
			
if ($examcode==$_SESSION['examcode']) {
			if($_SESSION['examstatus']==1)
			{
				
					echo "<script type=text/javascript>alert('Sorry; you have taken this exam once from our record, you cant have it the second time.');</script>";
					echo "<script type=text/javascript>window.location='../index.php'</script>";
			}else{
					echo "<script type=text/javascript>alert('Login Succesfully');</script>";
					echo "<script type=text/javascript>window.location='../complete.php'</script>";
			}
				
} else {
					
					//echo 'notvalid';
					/*echo "<script type=text/javascript>alert('Invalid Login Credientials Supplied; Login Failed');</script>";
					echo "<script type=text/javascript>window.location='../index.php'</script>";*/
					die (mysqli_error($iqcon));
				
					
}
		
			
		}
	}
	else 
			{
				//$loggedin=false;
			    //header("location:../index.php");
				die (mysqli_error($iqcon));
				
			}
	
}

?>