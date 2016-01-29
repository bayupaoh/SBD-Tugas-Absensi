
<?php
	include "koneksi.php";
	
	$file=$_FILES['file']['name'];
	$tabel=$_POST['tabel'];
	

			if($sql=mysql_query("LOAD DATA INFILE '$file' INTO TABLE $tabel;") ){
			?><script>alert('Restore sukses')</script><?php
echo '<META HTTP-EQUIV="Refresh" Content="0; URL=setting.php">';			
			}else{
				?><script>alert('Restore gagal'); history.go(-1);</script><?php
			}	
			
		
	
?>