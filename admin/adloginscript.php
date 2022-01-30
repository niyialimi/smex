<?php
session_start();
require_once('../Connections/examcon.php');
//mysqli_select_db($iqcon,"cbt_db");
$aduname=mysqli_real_escape_string($iqcon,$_POST['aid']);
$adpass=mysqli_real_escape_string($iqcon,$_POST['apwd']);


if($aduname && $adpass )
{
	
	$logsql="select * from admintab where auname='$aduname'";
	$result=mysqli_query($iqcon,$logsql);
	if (mysqli_num_rows($result))
	{
		while($rows=mysqli_fetch_assoc($result))
		{
			//echo $rows['useremail']."  ".$rows['password'];
			$_SESSION['aid']=$rows['aid'];
			$_SESSION['password']=$rows['apwd'];
			$_SESSION['username']=$rows['auname'];
			//echo $_SESSION['password'].$_SESSION['username'];
			
if (password_verify($adpass,$_SESSION['password']) && $_SESSION['username']==$aduname) {
			//$_SESSION['ntoken']=1;
					//echo 'OK';
					echo "<script type=text/javascript>alert('Login Succesfully');</script>";
					echo "<script type=text/javascript>window.location='examadmin.php'</script>";
					
				
} else {
					
					//echo 'NOTOK';
					echo "<script type=text/javascript>alert('Invalid Login Credientials Supplied; Login Failed');</script>";
					echo "<script type=text/javascript>window.location='index.php'</script>";
				
					
}
			
			
		}
	}
	else 
			{
				$loggedin=false;
			    header("location:index.php");
				//die (mysqli_error($con));
				
			}
	
}

?>