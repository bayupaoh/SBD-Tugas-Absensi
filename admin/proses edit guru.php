
<?php
	include "koneksi.php";
	
	$nip_guru=$_POST["nip"];
	$nama_guru=$_POST["namaguru"];
	
	$tanggallahir_guru=$_POST["tanggallahir"];
	$email_guru=$_POST["email"];
	$username_guru=$_POST["username"];
	$telepon_guru=$_POST["telepon"];
	$password_guru=$_POST["password"];
	$foto_guru=$_FILES['file']['name'];
	
	
	$target = "images/guru/".$foto_guru;
	
	
	if( empty($telepon_guru)  || empty($nama_guru) || empty($email_guru) || empty($username_guru) )
	{
		?><script>alert('Ada field yang tidak di isi'); history.go(-1);</script><?php
	}else { 
		$sql="update guru set nama_guru='$nama_guru',email='$email_guru',username='$username_guru',no_telp='$telepon_guru' where id_guru='$nip_guru'";			
		
		if($res=mysql_query($sql)){						
			?><script>alert('Edit data guru sukses');</script><?php	 
		}else{
			?><script>alert('Edit data guru gagal'); history.go(-1);</script><?php
		}
		
		if(!empty($tanggallahir_guru)){
			if($sql=mysql_query("update guru set tgl_lahir='$tanggallahir_guru' where id_guru='$nip_guru'")){
			?><script>alert('Edit tnggal lahir guru sukses');</script><?php	 
			}else{
				?><script>alert('Edit tnggal lahir gagal'); history.go(-1);</script><?php
			}					
		}
		
		if(!empty($password_guru)){
			if($sql=mysql_query("update guru set password=md5('$password_guru') where id_guru='$nip_guru'")){
			?><script>alert('Edit password guru sukses');</script><?php	 
			}else{
				?><script>alert('Edit password guru gagal'); history.go(-1);</script><?php
			}					
		}
		
		if(!empty($foto_guru)){
			if($sql=mysql_query("update guru set foto_profil='$foto_guru' where id_guru='$nip_guru'") && move_uploaded_file($_FILES['file']['tmp_name'],$target) ){
			?><script>alert('Edit foto guru sukses')</script><?php	 
			}else{
				?><script>alert('Edit foto guru gagal'); history.go(-1);</script><?php
			}					
		}
	}
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=lihat guru.php">';
	
?>