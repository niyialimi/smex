<?php
session_start();
require_once('../Connections/examcon.php');
$oldpwd=mysqli_real_escape_string($iqcon,$_POST['oldpwd']);
$newpwd=mysqli_real_escape_string($iqcon,$_POST['newpwd']);
if( isset ($oldpwd) && isset ($newpwd))
{
	//echo $parentid;
	$pselect="select * from admintab where auname='".$_SESSION['username']."'"; 
	$output=mysqli_query($iqcon,$pselect);
	if(mysqli_num_rows($output))
	{
		while($rows=mysqli_fetch_array($output))
		{
			echo $_SESSION['username'];//quivapistis#60
		$foldpwd=$rows['apwd'];
			if (password_verify($oldpwd,$foldpwd)) {
				
				$newpwd=password_hash($newpwd,PASSWORD_BCRYPT);
				$update="update admintab set apwd='$newpwd' where aid='".$_SESSION['aid']."' ";
				$result=mysqli_query($iqcon,$update);
					if($result)
					{	
						echo 'Password Changed';
						
					
					}else {
						echo 'Error Changing Password';//die (mysqli_error($con));
					}
					
			}
			else {echo 'Wrong Old Password Entered';}
			
		}
	}
}
?>