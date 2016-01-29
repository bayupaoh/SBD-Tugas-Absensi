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
	$admin_name = $_SESSION["guru_user_name"];
	$admin_foto = $_SESSION["guru_user_foto"];
	$query="select * from sekolah";
	$res=mysql_query($query);
	while($data=mysql_fetch_array($res)){
		$nama_sekolah=$data['nama_sekolah'];
		$alamat = $data['alamat'];
		$deskripsi=$data[3];
	}
	
	$jumlah_guru=mysql_num_rows(mysql_query("select * from guru where status='Guru'"));
	$jumlah_kelas=mysql_num_rows(mysql_query("select * from kelas"));
	$jumlah_siswa=mysql_num_rows(mysql_query("select * from siswa"));
	
	
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
          <a class="mdl-navigation__link" href="admin.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation"><i class="mdi mdi-bank"></i></i>Home</a>                
          <a class="mdl-navigation__link" href="absensi.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation"><i class="mdi mdi-view-list"></i></i>Absensi</a>                
          <a class="mdl-navigation__link" href="lihat murid.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation"><i class="mdi mdi-account"></i></i>Lihat Murid</a>
          <a class="mdl-navigation__link" href="message broadcast.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation"><i class="mdi mdi-message-text"></i></i>Message Broadcast</a>
          <a class="mdl-navigation__link" href="message personal.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation"><i class="mdi mdi-message-draw"></i></i>Message Personal</a>                    
        </nav>
      </div>
	  <main class="mdl-layout__content mdl-color--grey-100">
        <div class="mdl-grid demo-content">
          <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid">
            <style>
.demo-card-event.mdl-card {
  width: 256px;
  height: 256px;
  background: #3E4EB8;
}
.demo-card-event > .mdl-card__actions {
  border-color: rgba(255, 255, 255, 0.2);
}
.demo-card-event > .mdl-card__title {
  align-items: flex-start;
}
.demo-card-event > .mdl-card__title > h4 {
  margin-top: 0;
}
.demo-card-event > .mdl-card__actions {
  display: flex;
  box-sizing:border-box;
  align-items: center;
}
.demo-card-event > .mdl-card__title,
.demo-card-event > .mdl-card__actions,
.demo-card-event > .mdl-card__actions > .mdl-button {
  color: #fff;
}
</style>

<div class="demo-card-event mdl-card mdl-shadow--2dp">
  <div class="mdl-card__title mdl-card--expand">
    <h4>
      Jumlah Guru:<br>
      <?php echo $jumlah_guru;?><br>
      Orang
    </h4>
  </div>
  <div class="mdl-card__actions mdl-card--border">
    <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
      Statistik Guru
    </a>
    <div class="mdl-layout-spacer"></div>
    <i class="material-icons"><i class="mdi mdi-account"></i></i>
  </div>
</div>
<pre> </pre>
<div class="demo-card-event mdl-card mdl-shadow--2dp">
  <div class="mdl-card__title mdl-card--expand">
    <h4>
      Jumlah Siswa:<br>
      <?php echo $jumlah_siswa;?><br>
      Orang
    </h4>
  </div>
  <div class="mdl-card__actions mdl-card--border">
    <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
      Statistik Siswa
    </a>
    <div class="mdl-layout-spacer"></div>
    <i class="material-icons"><i class="mdi mdi-account"></i></i>
  </div>
</div>
<pre> </pre>
<div class="demo-card-event mdl-card mdl-shadow--2dp">
  <div class="mdl-card__title mdl-card--expand">
    <h4>
      Jumlah Kelas:<br>
      <?php echo $jumlah_kelas;?><br>
      Kelas
    </h4>
  </div>
  <div class="mdl-card__actions mdl-card--border">
    <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
      Statistik Kelas
    </a>
    <div class="mdl-layout-spacer"></div>
    <i class="material-icons"><i class="mdi mdi-home"></i></i>
  </div>
</div>
<pre> </pre>
<div class="demo-card-event mdl-card mdl-shadow--2dp">
  <div class="mdl-card__title mdl-card--expand">
    <h4>
      Admin : <br>
		<?php echo $admin_name ;?><br>
      Welcome :)
    </h4>
  </div>
  <div class="mdl-card__actions mdl-card--border">
    <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
      <?php echo date("d/m/Y h:i:s");?>
    </a>
    <div class="mdl-layout-spacer"></div>
    <i class="material-icons"></i>
  </div>
</div>
          </div>
		
		<div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid">
 
        
         </div>
		  
          <div class="demo-cards mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet mdl-grid mdl-grid--no-spacing">
         
          </div>
        </div>
      </main>

    </div>
    <script src="js/material.min.js"></script>
  </body>
</html>
