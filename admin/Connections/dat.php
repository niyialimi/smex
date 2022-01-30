<?php
require_once('examcon.php');
if(mysqli_query($iqcon,"Create Database smartexam_db"))
{
	echo "Database creation succesfull";
}
else
{
	echo "Error Creating Database:" . mysqli_error($iqcon);
}
?>