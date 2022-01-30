<?php
session_start(); //start session
 
//destroy session
session_destroy();
 
header ("Location:index.php");
?>