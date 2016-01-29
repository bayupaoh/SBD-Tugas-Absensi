<?php
	include "koneksi.php";
	$id_kelas=$_GET['kelas'];
	$nim=$_GET['nim'];
	
    $sql="SELECT * FROM `absensi` WHERE id_kelas='$id_kelas' AND id_siswa='$nim'";
	$res_siswa=mysql_query($sql);
	$berhasil=true;
	while($data=mysql_fetch_array($res_siswa)){
		$id_absensi= $data[0];
		$tanggal= $data[1];
		$keterangan= $data[2];
		$id_post='ket'.$id_absensi;
		$ket=$_POST[$id_post];
		if($sql_absen=mysql_query("UPDATE `absensi` SET `keterangan` = '$ket' WHERE `absensi`.`id_absensi` = $id_absensi")){
			
		}else{
			
			$berhasil=false;
			echo 'gagal';
		}
	}
	
	if($berhasil){
		?> <script>alert('Simpan Data Berhasil')</script><?php
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=absensi detail laporan.php?nama_kelas='.$id_kelas.'">';		
	}else{
		?> <script>alert('Simpan Data Gagal');history.go(-1);</script><?php		
	}
	
?>