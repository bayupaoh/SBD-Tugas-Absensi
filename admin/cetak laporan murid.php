
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
    $query = "select id_siswa,nama_siswa,jk,no_telp,k.nama_kelas from siswa s join kelas k on s.id_kelas=k.id_kelas";
    $sql = mysql_query ($query);
    $data = array();
    while ($row = mysql_fetch_assoc($sql)) {
    array_push($data, $row);
    }
	
    #setting judul laporan dan header tabel
    $judul = "LAPORAN DAFTAR MURID";
	
    $header = array(
    array("label"=>"NIM", "length"=>20, "align"=>"C"),
	array("label"=>"Nama ", "length"=>40, "align"=>"C"),
	array("label"=>"jk", "length"=>40, "align"=>"C"),
	array("label"=>"No Telp", "length"=>37, "align"=>"C"),
    array("label"=>"Nama Kelas", "length"=>37, "align"=>"C")
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
    $pdf->Cell($kolom['length'], 5, $kolom['label'], 1, '0', $kolom['align'], true);
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
    $pdf->Cell($header[$i]['length'], 5, $cell, 1, '0', $kolom['align'], $fill);
    $i++;
    }
    $fill = !$fill;
    $pdf->Ln();
    }
     
    #output file PDF
	
    $pdf->Output();
    ?>