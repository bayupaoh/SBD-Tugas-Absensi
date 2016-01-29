<?php
	include "koneksi.php";
	$nip_guru=$_GET['id'];
	$sql="delete from guru where id_guru='$nip_guru'";
	
	
	if($res=mysql_query($sql)){
		?><script>alert('Hapus data guru sukses');</script><?php	
				echo '<META HTTP-EQUIV="Refresh" Content="0; URL=lihat guru.php">';
	}else{
		?><script>alert('Hapus data guru gagal');history.go(-1);</script><?php	
	}
	
?>