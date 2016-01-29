<?php
	include "koneksi.php";
	
	$nip_guru=$_POST["nip"];
	$nama_guru1=$_POST["namadepan"];
	$nama_guru2=$_POST["namabelakang"];
	$jk=$_POST["jk"];
	$nama_guru=$nama_guru1." ".$nama_guru2;
	
	$tanggallahir_guru=$_POST["tanggallahir"];
	$email_guru=$_POST["email"];
	$username_guru=$_POST["username"];
	$telepon_guru=$_POST["telepon"];
	$password_guru=$_POST["password"];
	$foto_guru=$_FILES['file']['name'];
	
	
	$target = "images/guru/".$foto_guru;
	
	
	if( $telepon_guru == "" || $nip_guru == ""  || $nama_guru == "" || $tanggallahir_guru == "" || $email_guru == "" || $username_guru == "" || $password_guru == "" || $foto_guru == "")
	{
		?><script>alert('Ada field yang tidak di isi')</script><?php
	}else if(($_FILES["file"]["size"] >= 5000000 )|| (($_FILES["file"]["type"]!= "image/jpeg") && ($_FILES["file"]["type"]!= "image/png"))){
		?><script>alert('File foto yang dimasukkan harus dibawah 5000 KB dan Type data jpeg atau png')</script><?php
	}else { 
		$sql="insert into guru values('$nip_guru','$nama_guru','$jk','$tanggallahir_guru','$email_guru','$username_guru',md5('$password_guru'),'$telepon_guru','$foto_guru','Guru')";
		
		if(move_uploaded_file($_FILES['file']['tmp_name'],$target) && $res=mysql_query($sql)){						
			?><script>alert('Pendaftaran sukses')</script><?php	 
		}else{
			?><script>alert('Pendaftaran gagal. ID Pegawai ada yang sama'); history.go(-1);</script><?php
		}
		
	}
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=tambah guru.php">';
	
?>