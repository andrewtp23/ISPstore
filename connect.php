<?php
session_start();
$db = mysql_connect("URLOFDATABASE","USER","PASSWORD") or die("Failed to open connection to MySQL server.");
mysql_select_db("DATABASENAME") or die("Unable to select database");
?>
