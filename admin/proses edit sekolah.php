<?php
	include "koneksi.php";
	$nama=$_POST["nama"];
	$alamat=$_POST["alamat"];
	$deskripsi=$_POST["deskripsi"];

	if( empty($nama) || empty($alamat) || empty($deskripsi)){
				?><script>alert('Ada field kosong');History.Go(-1);</script><?php	
	}else{
		$sql="update sekolah set nama_sekolah='$nama', alamat='$alamat', deskripsi='$deskripsi' where id_sekolah=1";
		$res=mysql_query($sql);
		if($res){
		?><script>alert('Update sukses');</script><?php
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=admin.php">';		
		}else{
		?><script>alert('Updata gagal');History.Go(-1);</script><?php				
				echo '<META HTTP-EQUIV="Refresh" Content="0; URL=admin.php">';	
		}
	}	
	
?>