<?php
	include "koneksi.php";
	
	$id_kelas=$_POST["id_kelas"];
	$nama=$_POST["nama"];
	$id_guru_wali=$_POST["nama_guru_wali"];
	
	if(empty($nama)){
		?> <script>alert('Ada field yang belum diisi');</script><?php
				echo '<META HTTP-EQUIV="Refresh" Content="0; URL=detail kelas.php?id=$id_kelas">';
	}else{
		if($sql=mysql_query("update kelas set nama_kelas='$nama', id_guru='$id_guru_wali' where id_kelas='$id_kelas'")){
		?> <script>alert('Edit kelas berhasil');</script><?php
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=lihat kelas.php">';		
		}else{
		?> <script>alert('Edit kelas gagal');history.go(-1);</script><?php			
		}

	}
	
?>