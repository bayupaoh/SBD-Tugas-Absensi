<html>
  <head>
    <title>Material Design Lite</title>

    <!-- SEO: If your mobile URL is different from the desktop URL, add a canonical link to the desktop page https://developers.google.com/webmasters/smartphone-sites/feature-phones -->
    <!--
    <link rel="canonical" href="http://www.example.com/">
    -->

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
	$admin_name = $_SESSION["user_name"];
	$admin_foto = $_SESSION["user_foto"];
	
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
          <img src="images/guru/<?php echo $admin_foto; ?>" class="demo-avatar">
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
          <a class="mdl-navigation__link" href="admin.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation"><i class="mdi mdi-bank"></i></i>Home</a>                
          <a class="mdl-navigation__link" href="tambah guru.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation"><i class="mdi mdi-account-plus"></i></i>Tambah Guru</a>
          <a class="mdl-navigation__link" href="lihat guru.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation"><i class="mdi mdi-account"></i></i>Lihat Guru</a>
          <a class="mdl-navigation__link" href="tambah kelas.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation"><i class="mdi mdi-home-variant"></i></i>Tambah Kelas</a>
          <a class="mdl-navigation__link" href="lihat kelas.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation"><i class="mdi mdi-home"></i></i>Lihat Kelas</a>                    
          <a class="mdl-navigation__link" href="tambah murid.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation"><i class="mdi mdi-account-multiple-plus"></i></i>Tambah Murid</a>
          <a class="mdl-navigation__link" href="lihat murid.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation"><i class="mdi mdi-account-multiple"></i></i>Lihat Murid</a>                    
        </nav>
      </div>
      <main class="mdl-layout__content mdl-color--white-100">
        <div class="mdl-grid demo-content">
          <!--<div class="demo-charts mdl-color--white  mdl-cell mdl-cell--12-col mdl-grid">-->
            <!-- List guru-->
		<form role="form" action="lihat murid.php" method="post" name="postform" enctype="multipart/form-data">
		<div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
            <label class="mdl-button mdl-js-button mdl-button--icon" for="search">
              <i class="material-icons"><i class="mdi mdi-account-search"></i></i>
            </label>
            <div class="mdl-textfield__expandable-holder">
              <input class="mdl-textfield__input" type="text" id="search" name="search" placeholder="Masukan nama murid"/>
              <label class="mdl-textfield__label" for="search">Masukan Nama Murid</label>
            </div>
        </div>
		</form>
		<table class="mdl-data-table mdl-js-data-table mdl-cell mdl-cell--12-col mdl-shadow--2dp">
					<thead>
					<tr>
					  <th class="mdl-data-table__cell--non-numeric">NIM</th>
					  <th class="mdl-data-table__cell--non-numeric">Nama Siswa</th>
					  <th class="mdl-data-table__cell--non-numeric">Kelas</th>
					  <th></th>					  
					</tr>
					</thead>
					<tbody>
     <?php
	 if ( empty($_POST["search"]) ){
    $sql=" select s.*,k.nama_kelas from siswa s join kelas k on s.id_kelas=k.id_kelas";
	}else{		
		$cari=$_POST['search'];
		$sql=" select s.*,k.nama_kelas from siswa s join kelas k on s.id_kelas=k.id_kelas where nama_siswa like '$cari%'";
	}
		

    $query=mysql_query($sql);
    
    while ($data=mysql_fetch_array($query)){
      $nim=$data["id_siswa"];
      $nama=$data["nama_siswa"];
      $jk=$data["jk"];
      $tgl_lahir=$data["tgl_lahir"];
      $alamat=$data["alamat"];
      $nama_ortu=$data["nama_ortu"];
      $telp_ortu=$data["telp_ortu"];
      $no_telp=$data["no_telp"];
      $nama_kelas = $data["nama_kelas"];
      ?>
     
					<tr>
					  <td class="mdl-data-table__cell--non-numeric"><?php echo $nim;?></td>
					  <td class="mdl-data-table__cell--non-numeric"><?php echo $nama;?></td>
					  <td class="mdl-data-table__cell--non-numeric"><?php echo $nama_kelas;?></td>
					  <td>
						<a id="desc<?php echo $nim; ?>" class="mdl-button mdl-js-button mdl-button--icon" href="detail siswa.php?id=<?php echo $nim; ?>">
						  <i class="mdi mdi-account"></i>							
						</a>							
						<div class="mdl-tooltip" for="desc<?php echo $nim; ?>">
							Tampilkan Detail Siswa
						</div>			
						<a id="edit<?php echo $nim; ?>" class="mdl-button mdl-js-button mdl-button--icon" href="edit siswa.php?id=<?php echo $nim; ?>">
						  <i class="mdi mdi-tooltip-edit"></i>
						</a>									
						<div class="mdl-tooltip" for="edit<?php echo $nim; ?>">
							Edit Siswa
						</div>			
						<a id="hapus<?php echo $nim; ?>" class="mdl-button mdl-js-button mdl-button--icon" href="proses hapus murid.php?id=<?php echo $nim; ?>" onclick="return confirm('Anda yakin ingin menghapus?');">
						  <i class="mdi mdi-delete"></i>
						</a>			
						<div class="mdl-tooltip" for="hapus<?php echo $nim; ?>">
							Hapus Siswa
						</div>															
					  <br>
					  </td>					  
					</tr>
      <?php }?>
					</tbody>
					</table>
            <!-- /List guru-->
          <!--</div>-->
			<a href="cetak laporan murid.php"><button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent " >Print Report Siswa</button></a>		  
        </div>
      </main>
    </div>
  <script src="../../material.min.js"></script>
  </body>
</html>
<script>
</script>