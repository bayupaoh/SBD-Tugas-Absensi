<?php
	include ("koneksi.php");
	$login=mysql_query("select * from sekolah");
	while ($rowsekolah=mysql_fetch_array($login)){
		$namasekolah=$rowsekolah["nama_sekolah"];
		$alamat=$rowsekolah["alamat"];
		$desk=$rowsekolah["deskripsi"];
	}
?>

<html>
  <head>
    <title><?php echo $namasekolah; ?></title>
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
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/material.min.js"></script>  
    <script src="js/materialDate.js"></script>  
    

    
    <!-- Simple header with scrollable tabs. -->
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
      <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
          <!-- Title -->
          <span class="mdl-layout-title"><?php echo $namasekolah; ?></span>
        </div>
        <!-- Tabs -->
      </header>
      
      <main class="mdl-layout__content">
        <section class="mdl-layout__tab-panel is-active" id="scroll-tab-1">
          <div class="page-content"><!-- Your content goes here -->
          <center>
          <form role="form" action="#" method="post" name="postform">
                <h3><?php echo $namasekolah; ?></h3>
                <h5><?php echo $alamat; ?></h5>
                <br>                
                <h6><?php echo $desk; ?></h6>
                <br><br>
				<hr>
            </form>
          </center>
          </div>
        </section>
        <section class="mdl-layout__tab-panel is-active" id="scroll-tab-1">
          <div class="page-content"><!-- Your content goes here -->
          <center>
          <form role="form" action="index.php" method="post" name="postform">
                <h4>CEK ABSENSI</h4>
				<h6>Masukan NIM untuk cek kehadiran</h6>
                <br>                
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <label for="nim" class="mdl-textfield__label">NIM</label>
                    <input type="text" pattern="[0-9]*" class="mdl-textfield__input" id="nim" name="nim" />
                    <span class="mdl-textfield__error">Inputan yang diterima berupa angka</span>
                </div>
                <br><br>
                <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent " type="submit">Cek Kehadiran</button>
            </form>
          </center>
          </div>
        </section>
        <section class="mdl-layout__tab-panel is-active" id="scroll-tab-1">
          <div class="page-content"><!-- Your content goes here -->
          <center>
		  <?php
		if (isset($_POST['nim']))
		{
		include ("koneksi.php");
		$nim=htmlentities((trim($_POST['nim'])));
		$sql="SELECT DISTINCT(absensi.tanggal),absensi.keterangan,absensi.id_siswa,siswa.nama_siswa FROM absensi join siswa on absensi.id_siswa=siswa.id_siswa where absensi.id_siswa='$nim'";
		$hasil=mysql_query($sql);
		$jumlah=mysql_num_rows($hasil);
		if($jumlah==0){
			?><script>alert('NIM yang anda cari tidak terdaftar'); history.go(-1);</script><?php
		}else{
		?>
		      <table class="mdl-data-table mdl-js-data-table mdl-cell mdl-cell--12-col mdl-shadow--2dp">
					<thead>
					<tr>
					  <th class="mdl-data-table__cell--non-numeric">NIM</th>
					  <th class="mdl-data-table__cell--non-numeric">Nama Murid</th>
					  <?php
					  $sql="SELECT DISTINCT(absensi.tanggal),absensi.keterangan,absensi.id_siswa,siswa.nama_siswa FROM absensi join siswa on absensi.id_siswa=siswa.id_siswa where absensi.id_siswa='$nim'";
					  $hasil=mysql_query($sql);
					  $i=1;
					  while($row=mysql_fetch_array($hasil)){
						  echo '<th class="mdl-data-table__cell--non-numeric"> '.$i++.' </th>';
						  $nama=$row['nama_siswa'];
					  }
					  ?>
					</tr>
					</thead>
					<tbody>
					<tr>
					<?php
					  $sql="SELECT DISTINCT(absensi.tanggal),left(absensi.keterangan,1) as 'keterangan',absensi.id_siswa,siswa.nama_siswa FROM absensi join siswa on absensi.id_siswa=siswa.id_siswa where absensi.id_siswa='$nim'";
					  $hasil=mysql_query($sql);
					  $i=1;
					  echo '<td class="mdl-data-table__cell--non-numeric">'.$nim.'</td>';					  
					  echo '<td class="mdl-data-table__cell--non-numeric">'.$nama.'</td>';
					  while($row=mysql_fetch_array($hasil)){
						  echo '<td class="mdl-data-table__cell--non-numeric">'.$row["keterangan"].'</td>';
					  }
		}
					  ?>
					  

					</tr>
					</tbody>
			</table>
		<?php
		}else{
			unset($_POST['user_email']);
		}
		  ?>
          </center>
          </div>
        </section>        
      </main>
    </div>
   
	<script type="application/dart" src="dart/main.dart"></script>
	<script data-pub-inline src="packages/browser/dart.js"></script>

 </body>
</html>

