<?php
	include "koneksi.php";
	
	$id_kelas=$_POST["id_kelas"];
	$nama=$_POST["nama"];
	$nama_guru_wali=$_POST["nama_guru_wali"];
	
	if(empty($id_kelas) ||  empty($nama)){
		?> <script>alert('Ada field yang belum diisi');</script><?php
	}else{
		if($sql=mysql_query("insert into kelas values('$id_kelas','$nama',1,'$nama_guru_wali')")){
		?> <script>alert('Tambah kelas berhasil');</script><?php
		
		}else{
		?> <script>alert('Tambah kelas gagal. ID Kelas ada yang sama');history.go(-1);</script><?php			
		}
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=tambah kelas.php">';
	}
?>