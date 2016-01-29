
<?php
	include "koneksi.php";
	
	$nim=$_POST["nim"];
	$nama_murid=$_POST["nama"];
	$jk=$_POST["jk"];
		
	$tgl_lahir=$_POST["tanggallahir"];
	$alamat=$_POST["alamat"];
	$telepon=$_POST["no_telp"];
	$nama_ortu=$_POST["nama_ortu"];
	$telp_ortu=$_POST["telp_ortu"];	
	$foto=$_FILES['file']['name'];
	$kelas=$_POST["kelas"];
	
	$target = "images/murid/".$foto;
	
	
	
	if( empty($telp_ortu)  || empty($nama_murid)  )
	{
		?><script>alert('Ada field yang tidak di isi'); history.go(-1);</script><?php
	}else { 
		$sql="update siswa set id_kelas='$kelas' ,nama_siswa='$nama_murid',alamat='$alamat',no_telp='$telepon',nama_ortu='$nama_ortu',telp_ortu='$telp_ortu' where id_siswa='$nim' ";			
		
		if($res=mysql_query($sql)){						
			?><script>alert('Edit data guru sukses');</script><?php	 
		}else{
			?><script>alert('Edit data guru gagal'); history.go(-1);</script><?php
		}
		
		if(!empty($tgl_lahir)){
			if($sql=mysql_query("update siswa set tgl_lahir='$tgl_lahir' where id_siswa='$nim'")){
			?><script>alert('Edit tnggal lahir guru sukses');</script><?php	 
			}else{
				?><script>alert('Edit tnggal lahir gagal'); history.go(-1);</script><?php
			}					
		}
		
		
		if(!empty($foto)){
			if($sql=mysql_query("update siswa set foto_murid='$foto_murid' where id_siswa='$nim'") && move_uploaded_file($_FILES['file']['tmp_name'],$target) ){
			?><script>alert('Edit foto guru sukses')</script><?php	 
			}else{
				?><script>alert('Edit foto guru gagal'); history.go(-1);</script><?php
			}					
		}
	}
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=lihat murid.php">';
	
?>