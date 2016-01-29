<?php
$host = "localhost";
$user = "root";
$pass = "";
$database = "sbd_10113076";
$koneksi = mysql_connect($host,$user,$pass);
mysql_select_db($database)
or die ("Connect failed".mysql_error());
//error_reporting(E_ALL^(E_NOTICE | E_WARNING));	`
?>