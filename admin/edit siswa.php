<html>
  <head>
    <title>Admin SMP Negeri 1 Cikijing</title>

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
	$id_siswa = $_GET['id'];
	
	$query=mysql_query("select s.*,k.nama_kelas from siswa s join kelas k on s.id_kelas=k.id_kelas where id_siswa='$id_siswa'");
	while ($data=mysql_fetch_array($query)){			
		$id_siswa = $data['id_siswa'];
		$nama_kelas = $data['nama_kelas'];
		$nama_siswa= $data['nama_siswa'];
		$jk = $data['jk'];
		$tgl_lahir = $data['tgl_lahir'];
		$alamat = $data['alamat'];
		$no_telp= $data['no_telp'];
		$nama_ortu = $data['nama_ortu'];
		$telp_ortu = $data['telp_ortu'];
		$foto_murid = $data['foto_murid'];
		$id_kelas = $data['id_kelas'];		
	}
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
          <div class="demo-charts mdl-color--white  mdl-cell mdl-cell--12-col mdl-grid">
            <!-- Form Tambah Guru-->
                        <form role="form"  action="proses edit murid.php" method="post" name="postform" enctype="multipart/form-data">
                <h4>FORM EDIT GURU</h4>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <label for="nim" class="mdl-textfield__label">NIM</label>
                    <input type="text" pattern="[P0-9]*" class="mdl-textfield__input" readonly name="nim" id="nim" value="<?php echo $id_siswa; ?>" />
                    <span class="mdl-textfield__error">Format : PXXX</span>
                </div>
                <br>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <label for="nama" class="mdl-textfield__label">Nama</label>
                    <input id="nama" name="nama" type="text" pattern="[A-Z a-z]*" class="mdl-textfield__input" value="<?php echo $nama_siswa; ?>" />
                    <span class="mdl-textfield__error">Tidak boleh berupa angka atau simbol</span>
                </div>  
                <br>
                <label for="jk" class="mdl-radio mdl-js-radio mdl-js-ripple-effect">
                    <input type="radio" class="mdl-radio__button" id="jk" name="jk" value="Pria" checked/>
                    <span class="mdl-radio__label"> Pria </span>
                </label>

                <label for="jk" class="mdl-radio mdl-js-radio mdl-js-ripple-effect">
                    <input type="radio" class="mdl-radio__button" id="jk" name="jk" value="Wanita" />
                    <span class="mdl-radio__label"> Wanita</span>
                </label>
                <br>
                 <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label ">
                    <label >Tanggal Lahir</label>
                    <input type="date" class="mdl-textfield__input" id="input_text"  name="tanggallahir"  />                    
                </div>
                <br>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label ">
                    <label for="alamat" class="mdl-textfield__label">Alamat</label>
                    <textarea name="alamat" id="alamat" class="mdl-textfield__input"><?php echo $alamat; ?></textarea>
                </div>
                <br>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <label for="no_telp" class="mdl-textfield__label">No Telp (+62)</label>
                    <input type="text" pattern="[0-9]*" class="mdl-textfield__input" id="no_telp" name="no_telp" value="<?php echo $no_telp; ?>" />
                    <span class="mdl-textfield__error">Masukan hanya berupa angka</span>
                </div>
                <br>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <label for="nama_ortu" class="mdl-textfield__label">Nama Orang Tua</label>
                    <input type="text" pattern="[A-Z a-z]*" class="mdl-textfield__input" id="nama_ortu" name="nama_ortu" value="<?php echo $nama_ortu; ?>" />
                    <span class="mdl-textfield__error">Masukan hanya berupa angka</span>
                </div>
                <br>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <label for="telp_ortu" class="mdl-textfield__label">No Telp Ortu (+62)</label>
                    <input type="text" pattern="[0-9]*" class="mdl-textfield__input" id="telp_ortu" name="telp_ortu" value="<?php echo $telp_ortu; ?>" />
                    <span class="mdl-textfield__error">Masukan hanya berupa angka</span>
                </div>
                <br>                                
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <label for="kelas" class="mdl-textfield__label">Kelas</label>
                    <select name="kelas" id="kelas" class="mdl-textfield__input" >
                      <option disabled selected>Pilih Kelas</option>
                      <?php
                        $sql_dosen=mysql_query("select * from kelas");
                        while($data=mysql_fetch_array($sql_dosen)){
                          if($data[0] != $id_kelas){
                          echo "<option value='$data[0]' > $data[1] </option>";
                          }else{
                          echo "<option value='$data[0]' selected > $data[1] </option>";
                          }
                        }     
                      						
                      ?>
                    </select>
                </div>
                <br>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <label >Masukan Foto (JPG atau PNG)</label>
                    <input type="file" class="mdl-textfield__input" id="file" name="file" />
                </div>
                <br>                
                <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent " type="submit">Edit Siswa</button>
            </form>

            <!-- /form tambah guru-->
          </div>
        </div>
      </main>
    </div>



  </body>
</html>
