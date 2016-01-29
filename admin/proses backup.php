<?php
	include "koneksi.php";
	$table_name = "guru";
	$backup_file  = "barang.txt";
	$sql = "SELECT * INTO OUTFILE '$backup_file' FROM $table_name";
	
	$retval = mysql_query( $sql);
	if(! $retval )
	{
	  die('Could not take data backup: ' . mysql_error());
	}
	echo "<script>alert('Backup data berhasil')</script>";

?>