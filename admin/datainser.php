<?php
require_once('../Connections/examcon.php');
session_start();
mysqli_select_db($iqcon,"cbt_db");
	$username='pistis';
	$password='quivapistis#60';
	$password=password_hash($password,PASSWORD_BCRYPT);
	$role='Systemadmin';
	$sql="INSERT INTO admintab (auname,apwd,role) VALUES ('$username','$password','$role')";
					
						if(mysqli_query($iqcon,$sql))
						{
							//echo 'SENT';
							$response_array['status'] = 'success'; /* match error string in jquery if/else */ 
							$response_array['message'] = 'message sent!';   /* add custom message */ 
							header('Content-type: application/json');
							echo json_encode($response_array);
						}
						else{
								 				
								 $response_array['status'] = 'error'; /* match error string in jquery if/else */ 
								 $response_array['message'] = 'message not sent!';   /* add custom message */ 
								  header('Content-type: application/json');
								  json_encode($response_array);							
								 die(mysqli_error($iqcon));
						}


?>

