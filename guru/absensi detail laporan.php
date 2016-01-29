<html>
  <head>
    <title>Admin SMP Negeri 1 Cikijing</title>
 
    <link href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en" rel="stylesheet">
    <link rel="stylesheet" href="css/material.min.css" media="screen,projection">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/material.css">    
    <link rel="stylesheet" href="css/materialDate.css">         
    <link href="css/materialdesignicons.min.css" media="all" rel="stylesheet" type="text/css" />
   
    <script src="libs/moment.min.js"></script>
    <script src="libs/jquery-2.1.3.min.js"></script>
    <script src="libs/knockout-3.2.0.js"></script>
    <script src="material-datepicker/js/material.datepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="material-datepicker/css/material.datepicker.css">
 
    <style>
    #view-source {
      position: fixed;
      display: block;
      right: 0;
      bottom: 0;
      margin-right: 40px;
      margin-bottom: 40px;
      z-index: 900;
    }
    </style>
  </head>
  <body> 
<?php
	
	session_start();
	include "koneksi.php";
	/*
	if(isset($_session['id'])){
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';	
	}*/		
	$admin_id = $_SESSION['guru_id'];
	$admin_name = $_SESSION["guru_user_name"];
	$admin_foto = $_SESSION["guru_user_foto"];
	
	
	
?>	       
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/material.min.js"></script>  
    <script src="js/materialDate.js"></script>  

    <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
<header class="demo-header mdl-layout__header mdl-color--white mdl-color--grey-100 mdl-color-text--grey-600">
        <div class="mdl-layout__header-row">
          <span class="mdl-layout-title">Home</span>
          <div class="mdl-layout-spacer"></div>
          <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="hdrbtn">
            <i class="material-icons"><i class="mdi mdi-dots-vertical"></i></i>
          </button>
          <ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right" for="hdrbtn">
            <a href="logout.php"><li class="mdl-menu__item">Log Out</li></a>
          </ul>
        </div>
      </header>
       <div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
        <header class="demo-drawer-header">
          <img src="../admin/images/guru/<?php echo $admin_foto; ?>" class="demo-avatar">
          <div class="demo-avatar-dropdown">
            <span><?php echo $admin_name ;?></span>
            <div class="mdl-layout-spacer"></div>
            <button id="accbtn" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
              <i class="material-icons" role="presentation"><i class="mdi mdi-menu-down"></i></i>
            </button>
            <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="accbtn">
              <a href="setting.php"><li class="mdl-menu__item"><i class="mdi mdi-settings"></i>  Setting</li></a>            
            </ul>                        
          </div>
		</header>
        <nav class="demo-navigation mdl-navigation mdl-color--blue-grey-800">             
          <a class="mdl-navigation__link" href="absensi.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation"><i class="mdi mdi-view-list"></i></i>Absensi</a>                
        </nav>
      </div>
	  <?php
		  $id_kelas=$_GET['nama_kelas'];
          $sql="select distinct(tanggal) from absensi where id_kelas='$id_kelas'";
		  $query=mysql_query($sql);               

		  
	  ?>
	  <main class="mdl-layout__content mdl-color--grey-100">
        <div class="mdl-grid demo-content">
        
		<div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid">
						  		  <h4>Report Kelas</h4>
      <table class="mdl-data-table mdl-js-data-table mdl-cell mdl-cell--12-col mdl-shadow--2dp">
					<thead>
					<tr>
					 <th class="mdl-data-table__cell--non-numeric"></th>
					  <th class="mdl-data-table__cell--non-numeric">NIM</th>
					  <th class="mdl-data-table__cell--non-numeric">Nama Murid</th>
					  <th class="mdl-data-table__cell--non-numeric"></th>
						<?php
								
						          while ($data=mysql_fetch_array($query)){
									echo '<th class="mdl-data-table__cell--non-numeric">'.$data[0].'<br><a href="proses hapus absensi.php?id='.$id_kelas.'&tgl='.$data[0].'">Hapus</a></th>';  
								  }
						?>					  
												
						  
						
					</tr>
					</thead>					  
								  
<?php

          $sql="select * from siswa where id_kelas='$id_kelas'";
		  $query=mysql_query($sql);               
          while ($data=mysql_fetch_array($query)){
            $nim=$data["id_siswa"];
            $nama_siswa=$data["nama_siswa"];
			?>
				<tbody>          
					<tr>
					  <td class="mdl-data-table__cell--non-numeric"><img src="../admin/images/murid/<?php echo $data["foto_murid"]; ?>" class="demo-avatar"></td>
					  <td class="mdl-data-table__cell--non-numeric"><?php echo $nim; ?></td>
					  <td class="mdl-data-table__cell--non-numeric"><?php echo $nama_siswa; ?></td>
					  <td class="mdl-data-table__cell--non-numeric"><a href="edit absensi.php?kelas=<?php echo $id_kelas; ?>&nim=<?php echo $nim; ?>">EDIT</a></td>

			<?php
			$sqla="select * from absensi where id_siswa='$nim'";
			$querya=mysql_query($sqla);
			while($data2=mysql_fetch_array($querya)){
          ?>			
					  
					  <?php

					  ?>
					  <td><?php echo $data2["keterangan"]; ?>
					  </td>
					 <?php
					}
					 ?>
					</tr>
          <?php } ?>
					</tbody>

					</table>
					<a href="cetak laporan absen.php?id_kelas=<?php echo $id_kelas; ?>"><button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent " type="submit">Cetak Report Data Absensi</button></a>
			
			<br>
          </div>
								
		
		  
          <div class="demo-cards mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet mdl-grid mdl-grid--no-spacing">
         
          </div>
        </div>
      </main>

    </div>
    <script src="js/material.min.js"></script>
  </body>
</html>
