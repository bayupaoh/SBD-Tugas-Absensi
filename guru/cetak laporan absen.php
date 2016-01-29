
	<?php
    //koneksi ke database
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbnm = "sbd_10113076";
	$idkelas=$_GET["id_kelas"];
    $conn = mysql_connect($host, $user, $pass);
    if ($conn) {
    $open = mysql_select_db($dbnm);
    if (!$open) {
    die ("Database tidak dapat dibuka karena ".mysql_error());
    }
    } else {
    die ("Server MySQL tidak terhubung karena ".mysql_error());
    }
    //akhir koneksi
     
	#ambil data masukkan ke header
	$query="select distinct(tanggal) as tanggal from absensi where id_kelas='$idkelas'";
    $sql = mysql_query ($query);
    $header = array();
    while ($row = mysql_fetch_assoc($sql)) {
    array_push($header, $row);
    }
	
    #setting judul laporan dan header tabel
    $judul = "LAPORAN ABSENSI";
    #sertakan library FPDF dan bentuk objek
    require_once ("fpdf/fpdf.php");
    $pdf = new FPDF();
    $pdf->AddPage();
     
    #tampilkan judul laporan
    $pdf->SetFont('Arial','B','12');
    $pdf->Cell(0,20, $judul, '0', 1, 'C');
     
    #buat header tabel
    $pdf->SetFont('Arial','','10');
    $pdf->SetFillColor(128,0,0);
    $pdf->SetTextColor(255);
    $pdf->SetDrawColor(20,10,0);
	
    $pdf->Cell(50, 5, 'Nama', 1 , '0', 'C', true);	
	$i=1;
    foreach ($header as $kolom) {
    $pdf->Cell(5, 5, $i++, 1, '0', 'C', true);
    }
    $pdf->Ln();
     
	 #ambil data masukkan ke nama
	$query="select distinct(id_siswa) as id_siswa from absensi where id_kelas='$idkelas'";
    $sql = mysql_query ($query);
    $data = array();
    while ($row = mysql_fetch_assoc($sql)) {
    array_push($data, $row);
    }

	 
    #tampilkan data tabelnya    
	$pdf->SetFillColor(224,235,255);
    $pdf->SetTextColor(0);
    $pdf->SetFont('');
    $fill=false;
    foreach ($data as $baris) {
    $i = 0;
	$j=0;
    foreach ($baris as $cell) {
		
    $pdf->Cell(50, 5, $baris["id_siswa"], 1, '0', 'C', $fill);
	#$pdf->Cell(5, 5, 's', 1, '0', 'C', $fill);
	#dari sini
	$idsiswa=$baris["id_siswa"];
	$queryisi="select left(keterangan,1) as keterangan from absensi where id_siswa='$idsiswa'";
    $sqlisi = mysql_query ($queryisi);
    while ($row = mysql_fetch_assoc($sqlisi)) {
		$pdf->Cell(5, 5, $row["keterangan"], 1, '0', 'C', $fill);
    }
	#sampai sini
	$i++;
    }
    $fill = !$fill;
    $pdf->Ln();
    }
    #output file PDF
	
	
	
	
    $pdf->Output();
    ?>