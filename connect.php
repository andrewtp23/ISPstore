<?php
session_start();
$db = mysql_connect("db1.cs.uakron.edu:3306","atp23","rooL7oog") or die("Failed to open connection to MySQL server.");
mysql_select_db("ISP_atp23") or die("Unable to select database");
?>