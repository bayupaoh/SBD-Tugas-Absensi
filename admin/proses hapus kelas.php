<?php
	include "koneksi.php";
	$id_kelas=$_GET["id"];
	
	$sql="delete from kelas where id_kelas='$id_kelas'";
	
	
	if($res=mysql_query($sql)){
		?><script>alert('Hapus data guru sukses');</script><?php	
	}else{
		?><script>alert('Hapus data guru gagal');</script><?php	
	}
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=lihat kelas.php">';
	
?>