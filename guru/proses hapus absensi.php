<?php
	include "koneksi.php";
	$id_kelas=$_GET['id'];
	$tgl_absen=$_GET['tgl'];
	
    $sql="DELETE FROM absensi WHERE id_kelas='$id_kelas' AND tanggal='$tgl_absen'";
	
	
	
	if($res_siswa=mysql_query($sql)){
		?> <script>alert('Hapus Data Berhasil')</script><?php
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=absensi detail laporan.php?nama_kelas='.$id_kelas.'">';		
	}else{
		?> <script>alert('Simpan Data Gagal');history.go(-1);</script><?php		
	}
	
?>