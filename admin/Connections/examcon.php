<?php
$db_hostname='localhost';
$db_username='root';
$db_password='';
$db_databasename='smartexam_db';


$iqcon = @mysqli_connect ($db_hostname, $db_username, $db_password) OR die ('Could not connect to MySQL: ' . mysqli_error($iqcon));
mysqli_select_db($iqcon,"smartexam_db") OR die('Could not select the database: ' . mysqli_error($iqcon) );
//@mysqli_select_db ($con,$db_databasename) OR die('Could not select the database: ' . mysqli_error($iqcon) ); 

?>


