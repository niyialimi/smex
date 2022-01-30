<?php
require_once('Connections/examcon.php');
//mysqli_select_db($iqcon,"cbt_db");
$sqltable = "CREATE TABLE qtable
(
qid int NOT NULL AUTO_INCREMENT,
PRIMARY KEY(qid),
question varchar(500),
optiona varchar(40),
optionb varchar(40),
optionc varchar(40),
optiond varchar(40),
optione varchar(40),
correctoption varchar(40),
mark int,
category varchar(15)
)";
mysqli_query($iqcon,$sqltable) or die(mysqli_error($iqcon));

?>
