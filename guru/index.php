<html>
  <head>
    <title>Login SMP Negeri 1 Cikijing</title>
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
    
<?php
		session_start();
		if (isset($_POST['user_email']) && isset($_POST['user_password']))
		{

		include ("koneksi.php");
		$user_email=htmlentities((trim($_POST['user_email'])));
		$user_password=htmlentities(md5($_POST['user_password']));

		$login=mysql_query("select * from guru where email='$user_email' and password='$user_password' and status='Guru'");
		$cek_login = mysql_num_rows($login);
		
		if ($cek_login != 1)
		 {
			 ?><script>alert('Email atau password salah')</script><?php
			 echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';
		 }else{
			while ($row=mysql_fetch_array($login))
			{
				$id=$row[0];
				$_SESSION['guru_id']=$row["id_guru"];
				$_SESSION['guru_user_email']=$user_email;
				$_SESSION['guru_user_name']=$row["nama_guru"];
				$_SESSION['guru_user_foto']=$row["foto_profil"];				
				echo '<META HTTP-EQUIV="Refresh" Content="0; URL=absensi.php">';	 
			}
		 }
		}else{
			unset($_POST['user_email']);
		}
?>

    
    <!-- Simple header with scrollable tabs. -->
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
      <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
          <!-- Title -->
          <span class="mdl-layout-title">SMP Negeri 1 Cikijing</span>
        </div>
        <!-- Tabs -->
      </header>
      
      <main class="mdl-layout__content">
        <section class="mdl-layout__tab-panel is-active" id="scroll-tab-1">
          <div class="page-content"><!-- Your content goes here -->
          <center>
          <form role="form" action="index.php" method="post" name="postform">
                <h4>LOGIN GURU</h4>
                <br>                
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <label for="user_email" class="mdl-textfield__label">Email</label>
                    <input type="email" class="mdl-textfield__input" id="user_email" name="user_email" />
                </div>
                <br>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <label for="user_password" class="mdl-textfield__label">Password</label>
                    <input type="password"  class="mdl-textfield__input" id="user_password" name="user_password" />
                </div>
                <br>
                <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent " type="submit">Login</button>
            </form>
          </center>
          </div>
        </section>
        
      </main>
    </div>
   
	<script type="application/dart" src="dart/main.dart"></script>
	<script data-pub-inline src="packages/browser/dart.js"></script>

 </body>
</html>
