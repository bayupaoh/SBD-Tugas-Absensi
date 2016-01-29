
<?php
	include "koneksi.php";
	$nim=$_GET['id'];
	$sql="delete from siswa where id_siswa='$nim'";
	
	
	if($res=mysql_query($sql)){
		?><script>alert('Hapus data guru sukses');</script><?php	
				echo '<META HTTP-EQUIV="Refresh" Content="0; URL=lihat murid.php">';
	}else{
		?><script>alert('Hapus data guru gagal');</script><?php	
				echo '<META HTTP-EQUIV="Refresh" Content="0; URL=lihat murid.php">';
	}
	
?>