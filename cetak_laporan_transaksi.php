<?php
 require("controller/conf.php");
 require("fpdf.php");
 $tanggal1 = $_GET['tanggal1'];
 $tanggal2 = $_GET['tanggal2'];
 $bulan1 = $_GET['bulan1'];
 $tahun1 = $_GET['tahun1'];
 $bulan2 = $_GET['bulan2'];
 $tahun2 = $_GET['tahun2'];
 $date1 = date("Y/m/d",strtotime("".$tahun1."/".$bulan1."/".$tanggal1));
 $date2 = date("Y/m/d",strtotime("".$tahun2."/".$bulan2."/".$tanggal2));

 define('FPDF_FONTPATH','font/');
 
$pdf=new FPDF('P','mm','A4');
 $pdf->Open();
 $pdf->SetAutoPageBreak(false);
 $pdf->AddPage();
  $pdf->Image('images/logo.png',10,0,50,0,'','http://www.yasperin.or.id/'); 
    $pdf->Ln(30);
  $pdf->SetFont('Arial','BU',15);
 $pdf->Cell(190,6,'Laporan Transaksi',0,0,'C');
 $pdf->Ln(15);
 $pdf->SetFont('Arial','BU',12);
  $pdf->Cell(190,6,'Periode dari '.$tanggal1.'/'.date("M",strtotime($date1)).'/'.$tahun1.' sampai '.$tanggal2.'/'.date("M",strtotime($date2)).'/'.$tahun2.'',0,0,'C');
 $pdf->Ln(15);
 
$y_axis_initial = 75;
 $pdf->SetFont('Arial','',10);
 $pdf->setFillColor(222,222,222);
 $pdf->SetY($y_axis_initial);
 $pdf->SetX(30);
 //Header tabel halaman 1
 $pdf->Cell(10,6,'No',1,0,'C',1);
 $pdf->Cell(25,6,'Tanggal',1,0,'C',1);
 $pdf->Cell(25,6,'Id Pemesanan',1,0,'C',1);
 $pdf->Cell(60,6,'Nama Pelanggan',1,0,'C',1);
 $pdf->Cell(30,6,'Alamat',1,0,'C',1);
 $pdf->Cell(35,6,'Total Transaksi',1,0,'C',1);

 $pdf->Ln();
 $max=25;//max baris perhalaman
 $i=0;
 $no=0;
 $row_height = 6;//tinggi tiap2 cell/baris
 $y_axis = $y_axis + $row_height;
 $date = date("Y-m-d");
 $grandtotal = 0;
   

	$rs2 = mysql_query("select pm.IdPelanggan as 'IdPelanggan',pm.IdPemesanan as 'IdPemesanan',pb.Total as 'Total',pm.Tanggal as 'Tanggal' from pemesanan pm,pembayaran pb where pm.IdPemesanan = pb.IdPemesanan and pm.Tanggal between '$date1' and '$date2' and pm.Status='Confirm' and pb.Status = 'Sudah Bayar'");

while($row = mysql_fetch_array($rs2))
{

$i++;
$total += $row['Total'];
$pelanggan = mysql_fetch_array(mysql_query("select * from pelanggan where IdPelanggan='".$row['IdPelanggan']."'"));

	
 $umur = intval($selisih/(60*60*24)/365);
 if ($i == $max){               //jika $i=25 maka buat header baru seperti di atas
 $pdf->AddPage();
 $pdf->SetY(10);
 $pdf->SetX(30);
 $pdf->CELL(10,6,'No',1,0,'C',1);
 $pdf->Cell(25,6,'Tanggal',1,0,'C',1);
 $pdf->Cell(25,6,'Id Pemesanan',1,0,'C',1);
 $pdf->Cell(60,6,'Nama Pelanggan',1,0,'C',1);
 $pdf->Cell(30,6,'Alamat Pelanggan',1,0,'C',1);
 $pdf->Cell(35,6,'Total Transaksi',1,0,'C',1);

$pdf->SetY(10);
 $pdf->SetX(55);
 $y_axis = $y_axis + $row_height;
 $i=0;
 $pdf->Ln();
 
 }

 $grandtotal+=$row['Total'];
 $i++;
 $no++;
  $pdf->SetX(30);
 $pdf->Cell(10,6,$no,1,0,'C',0);
 $pdf->Cell(25,6,$row['Tanggal'],1,0,'C',0);
 $pdf->Cell(25,6,$row['IdPemesanan'],1,0,'C',0);
 $pdf->Cell(60,6,$pelanggan['Nama'],1,0,'C',0);
 $pdf->Cell(30,6,$pelanggan['Alamat'],1,0,'C',0);
 $pdf->Cell(35,6,rp($row['Total']),1,0,'C',0);

 $pdf->Ln();

 }
 
//buat footer
 $now = date("d F Y");
 $pdf->Ln();
 $pdf->SetFont('Arial','B',10);
 $pdf->Cell(303,6,"Total Transaksi : ".rp($grandtotal)."",0,0,'C');
 $pdf->Ln();
 $pdf->Output('Laporan Transaksi'.date("F Y").'.pdf', 'I');
 ?>