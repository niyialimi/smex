<?php
session_start();
require_once('../admin/Connections/examcon.php');
$_SESSION['subject']= $_POST['subject'];
//echo $_POST['desiredexam'];
$selsub="select * from qtable where category='".$_POST['desiredexam']."' and subject='".$_POST['subject']."'";
$resultn=mysqli_query($iqcon,$selsub);
				if (mysqli_num_rows($resultn))
				{
					
						header('location: ../instruction.php');
							
					
				}
				else
				{			
							echo "<script type=text/javascript>alert('No Question Set For this exam yet');</script>";		
							echo "<script type=text/javascript>window.location='../complete.php'</script>";
						
						
				}
?>