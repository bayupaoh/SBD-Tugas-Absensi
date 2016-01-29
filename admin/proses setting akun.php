
<?php
	include "koneksi.php";
	$nim=$_GET["id"];
	$nama=$_POST["nama"];
	$jk=$_POST["jk"];
	$tgl_lahir=$_POST["tgl_lahir"];		
	$foto=$_FILES["file"]["name"];
	
	$target = "images/guru/".$foto;
	
	
	
	if(empty($nama))
	{
		?><script>alert('Ada field yang tidak di isi'); history.go(-1);</script><?php
	}else { 
		$sql="update guru set nama_guru='$nama' where id_guru ='$nim' ";			
		
		if($res=mysql_query($sql)){			
			$_SESSION['user_name']=$nama;
			?><script>alert('Edit data  sukses');</script><?php	 
		}else{
			?><script>alert('Edit data gagal'); history.go(-1);</script><?php
		}
		
		if(!empty($tgl_lahir)){
			if($sql=mysql_query("update guru set tgl_lahir='$tgl_lahir' where id_guru ='$nim'")){
			?><script>alert('Edit tnggal lahir guru sukses');</script><?php	 
			}else{
				?><script>alert('Edit tnggal lahir gagal'); history.go(-1);</script><?php
			}					
		}
		
		
		if(!empty($foto)){
			if($sql=mysql_query("update guru set foto_profil='$foto' where id_guru ='$nim'") && move_uploaded_file($_FILES['file']['tmp_name'],$target) ){
			$_SESSION['user_foto']=$foto;				
			?><script>alert('Edit foto guru sukses')</script><?php	 
			}else{
				?><script>alert('Edit foto guru gagal'); history.go(-1);</script><?php
			}					
		}
	}
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';
	
?>