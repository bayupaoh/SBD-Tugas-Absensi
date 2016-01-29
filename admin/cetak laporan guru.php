
	<?php
    //koneksi ke database
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbnm = "sbd_10113076";
     
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
     
    #ambil data di tabel dan masukkan ke array
    $query = "SELECT id_guru,nama_guru,tgl_lahir,jk,email,no_telp FROM guru where status='Guru'";
    $sql = mysql_query ($query);
    $data = array();
    while ($row = mysql_fetch_assoc($sql)) {
    array_push($data, $row);
    }
	
    #setting judul laporan dan header tabel
    $judul = "LAPORAN DAFTAR GURU";
	
    $header = array(
    array("label"=>"Id Guru", "length"=>20, "align"=>"C"),
	array("label"=>"Nama Guru", "length"=>40, "align"=>"C"),
	array("label"=>"Tanggal Lahir", "length"=>37, "align"=>"C"),
	array("label"=>"JK", "length"=>17, "align"=>"C"),
	array("label"=>"Email", "length"=>45, "align"=>"C"),
	array("label"=>"No Telepon", "length"=>23, "align"=>"C")
	);
     
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
    foreach ($header as $kolom) {
    $pdf->Cell($kolom['length'], 7, $kolom['label'], 1, '0', $kolom['align'], true);
    }
    $pdf->Ln();
     
    #tampilkan data tabelnya
    $pdf->SetFillColor(224,235,255);
    $pdf->SetTextColor(0);
    $pdf->SetFont('');
    $fill=false;
    foreach ($data as $baris) {
    $i = 0;
    foreach ($baris as $cell) {
    $pdf->Cell($header[$i]['length'], 7, $cell, 1, '0', $kolom['align'], $fill);
    $i++;
    }
    $fill = !$fill;
    $pdf->Ln();
    }
     
    #output file PDF
	
    $pdf->Output();
    ?>