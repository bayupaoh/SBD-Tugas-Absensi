<?php
	include "koneksi.php";
	$id_kelas=$_GET['id'];
	$querysiswa = "select * from siswa where id_kelas='$id_kelas'";
	$res_siswa=mysql_query($querysiswa);
	$berhasil=true;
	while($data=mysql_fetch_array($res_siswa)){
		$nim=$data[0];
		//echo $nim;
		$tgl=date("Y-m-d");
		$id_post='ket'.$nim;
		$ket=$_POST[$id_post];
		if($sql_absen=mysql_query("insert into absensi values(null,'$tgl','$ket','$id_kelas','$nim')")){
			
		}else{
			$berhasil=false;
			echo 'gagal';
		}
	}
	
	if($berhasil){
		?> <script>alert('Simpan Data Berhasil')</script><?php
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=absensi.php">';		
	}else{
		?> <script>alert('Simpan Data Gagal');history.go(-1);</script><?php		
	}
?>