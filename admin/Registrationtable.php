<?php
require_once('Connections/examcon.php');
//mysqli_select_db($iqcon,"cbt_db");
$sqltable="Create table register
(
	regid int NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (regid),
	firstname varchar(15),
	lastname varchar(15),
	Phone varchar(15),
	email varchar(20),
	occupation varchar(15),
	desiredprogram varchar(10),
	date varchar(10) 
)";
mysqli_query($iqcon,$sqltable)or die(mysqli_error($iqcon));
echo "table creation Succesfull";

?>