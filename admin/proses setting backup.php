
<?php
	include "koneksi.php";
	$table_name = "guru";
	$backup_file  = "backup.txt";
	$sql = "SELECT * INTO OUTFILE 'file siswa.txt' FROM siswa";
	$retval = mysql_query( $sql);
	$sql = "SELECT * INTO OUTFILE 'file guru.txt' FROM guru";
	$retval = mysql_query( $sql);
	$sql = "SELECT * INTO OUTFILE 'file sekolah.txt' FROM sekolah";
	$retval = mysql_query( $sql);
	$sql = "SELECT * INTO OUTFILE 'file kelas.txt' FROM kelas";	
	$retval = mysql_query( $sql);
	$sql = "SELECT * INTO OUTFILE 'file absensi.txt' FROM absensi";
	$retval = mysql_query( $sql);
	if(!$retval)
	{
	echo "<script>alert('Backup data gagal');history.go(-1);</script>";
die('Could not take data backup: ' . mysql_error());
	}else{
	echo "<script>alert('Backup data berhasil');history.go(-1);</script>";
	}
	
?>