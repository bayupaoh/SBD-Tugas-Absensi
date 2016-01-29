
<?php
	include "koneksi.php";

	$admin_id = $_GET['id'];
	
	
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$telp = $_POST['telp'];

	if (empty($email) || empty($username) || empty($telp)){
		?><script>alert('Ada field yang kosog'); history.go(-1);</script><?php	 	
	}else{
		$query="update guru set email='$email',username='$username', no_telp='$telp' where id_guru='$admin_id'";
		$res=mysql_query($query);
		if($res){
		?><script>alert('Update sukses')</script><?php	 		
		}else{
		?><script>alert('Update gagal'); history.go(-1);</script><?php
		}
		
		if(!empty($password)){
			$query="update guru set password=md5('$password') where id_guru='$admin_id'";
			$res=mysql_query($query);
			if($res){
			?><script>alert('Update password sukses')</script><?php	 		
			}else{
			?><script>alert('Update password gagal'); history.go(-1);</script><?php
			}
		}
	}
	
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=setting.php">';
	
?>