
<?php
	include "koneksi.php";
	
	$nim=$_POST["nim"];
	$nama_murid1=$_POST["namadepan"];
	$nama_murid2=$_POST["namabelakang"];
	$jk=$_POST["jk"];
	
	$nama_murid=$nama_murid1." ".$nama_murid2;
		
	$tgl_lahir=$_POST["tanggallahir"];
	$alamat=$_POST["alamat"];
	$telepon=$_POST["no_telp"];
	$nama_ortu=$_POST["nama_ortu"];
	$telp_ortu=$_POST["telp_ortu"];	
	$foto=$_FILES['file']['name'];
	$kelas=$_POST["kelas"];
	
	$target = "images/murid/".$foto;
	
	
	if( $nim== "" || $nama_murid1 == ""  || $nama_murid2 == "" || $telp_ortu == "" || $nama_ortu == "" || $telp_ortu == ""  || $foto== "")
	{
		?><script>alert('Ada field yang tidak di isi')</script><?php
	}else 
		if(($_FILES["file"]["size"] >= 5000000 )|| (($_FILES["file"]["type"]!= "image/jpeg") || ($_FILES["file"]["type"]!= "image/png"))){
		?><script>alert('File foto yang dimasukkan harus dibawah 5000 KB dan Type data jpeg atau png')</script><?php
	}else { 
		$sql="insert into siswa values('$nim','$nama_murid','$jk','$tgl_lahir','$alamat','$telepon','$nama_ortu','$telp_ortu','$kelas','$foto')";
			
		if(move_uploaded_file($_FILES['file']['tmp_name'],$target) && $res=mysql_query($sql)){						
			?><script>alert('Pendaftaran sukses');</script><?php	 
		}else{
			?><script>alert('Pendaftaran gagal. NIM ada yang sama'); </script><?php
			echo $sql;
		}

	}
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=tambah murid.php">';
	
?>