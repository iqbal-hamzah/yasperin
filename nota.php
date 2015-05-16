<?php
 require("controller/conf.php");
 require("fpdf.php");
 
 $bulan = 8;//$_POST['bln'];
 $tahun = 2014;//$_POST['thn'];
 $idpemesanan = $_GET['id'];
 $sql1 = "select * from pemesanan where IdPemesanan='".$idpemesanan."'";
 $rs = mysql_query($sql1) or die (mysql_error());
 $headerpemesanan = mysql_fetch_array($rs);
 
 $rs2 = mysql_query("select * from nota where IdPemesanan='".$idpemesanan."'") or die (mysql_error());
 $nota = mysql_fetch_array($rs2);
 
 $rspelanggan = mysql_query("select * from pelanggan where IdPelanggan='".$headerpemesanan['IdPelanggan']."'");
 $pengiriman = mysql_fetch_array(mysql_query("select * from pengiriman where IdPemesanan='".$idpemesanan."'"));
 $pelanggan = mysql_fetch_array($rspelanggan);
 define('FPDF_FONTPATH','font/');
 
$pdf=new FPDF('P','mm','A4');
 $pdf->Open();
 $pdf->SetAutoPageBreak(false);
 $pdf->AddPage();
 $pdf->Image('images/logo.png',10,0,50,0,'','http://www.yasperin.or.id/'); 
  $pdf->Ln(30);
 $pdf->SetFont('Arial','B',10);
 $pdf->Cell(50,6,'Kepada Yth.                                                                                                 No Nota : '.$nota['IdNota'].' ',0,0,'L');
 $pdf->Ln();
 $pdf->Cell(50,6,''.$pelanggan['Nama'].'                                                                                                 No Pemesanan : '.$headerpemesanan['IdPemesanan'].' ',0,0,'L');
 $pdf->Ln();
 $pdf->Cell(50,6,$pelanggan['Alamat'].'                                                                                       Tanggal Pemesanan : '.date("d-m-Y",strtotime($headerpemesanan['Tanggal'])).' ',0,0,'L');
 $pdf->Ln();
 $pdf->Cell(50,6,$pelanggan['Kota']."  ".$pelanggan['KodePos'],0,0,'L');
 $pdf->Ln(5);
 $pdf->SetFont('Arial','BU',15);
 $pdf->Cell(170,6,'Nota',0,0,'C');
 $pdf->Ln(15);
 
$y_axis_initial = 75;
 $pdf->SetFont('Arial','',10);
 $pdf->setFillColor(222,222,222);
 $pdf->SetY($y_axis_initial);
 $pdf->SetX(10);
 //Header tabel halaman 1
 $pdf->CELL(10,6,'No',1,0,'C',1);
 $pdf->Cell(15,6,'Id Buku',1,0,'C',1);
 $pdf->Cell(70,6,'Nama Buku',1,0,'C',1);
 $pdf->Cell(15,6,'Jumlah',1,0,'C',1);
 $pdf->Cell(25,6,'Harga',1,0,'C',1);
 $pdf->Cell(37,6,'Sub Total',1,0,'C',1);
 $pdf->Ln();
 $max=25;//max baris perhalaman
 $i=0;
 $no=0;
 $row_height = 6;//tinggi tiap2 cell/baris
 $y_axis = $y_axis + $row_height;
 $date = date("Y-m-d");
 $grandtotal = 0;
$sql2 = "select * from detailpemesanan where IdPemesanan='".$idpemesanan."'";
$rs2 = mysql_query($sql2) or die (mysql_error());
 
while($row = mysql_fetch_array($rs2))
 {
 $no++;
 $selisih = strtotime($date) -  strtotime($row[tgl_lahir]);
 $buku = mysql_fetch_array(mysql_query("select * from buku where IdBuku='".$row['IdBuku']."'"));
 $umur = intval($selisih/(60*60*24)/365);
 if ($i == $max){               //jika $i=25 maka buat header baru seperti di atas
 $pdf->AddPage();
 $pdf->SetY(10);
 $pdf->SetX(10);
 $pdf->CELL(10,6,'NO',1,0,'C',1);
 $pdf->Cell(15,6,'IdBuku',1,0,'C',1);
 $pdf->Cell(70,6,'Nama Buku',1,0,'C',1);
 $pdf->Cell(15,6,'Jumlah',1,0,'C',1);
 $pdf->Cell(25,6,'Harga',1,0,'C',1);
 $pdf->Cell(37,6,'SubTotal',1,0,'C',1);

$pdf->SetY(10);
 $pdf->SetX(25);
 $y_axis = $y_axis + $row_height;
 $i=0;
 $pdf->Ln();
 
 }
 //tampilkan data daari database
 $subtotal = $row['Jumlah'] * $row['Harga'];
 $grandtotal+=$subtotal;
 
 $pdf->Cell(10,6,$no,1);
 $pdf->Cell(15,6,$row['IdBuku'],1,0,'C',0);
 $pdf->Cell(70,6,$buku['Judul'],1,0,'C',0);
 $pdf->Cell(15,6,$row['Jumlah'],1,0,'C',0);
 $pdf->Cell(25,6,rp($row['Harga']),1,0,'C',0);
 $pdf->Cell(37,6,rp($subtotal),1,0,'C',0);
 $pdf->Ln();
 $i++;
 }
 
//buat footer
 $now = date("d F Y");
 $pdf->Ln();
 $pdf->SetFont('Arial','B',10);
 $grandtotal+= $pengiriman['Ongkos'];
  $pdf->Cell(300,6,"Ongkos Kirim : ".rp($pengiriman['Ongkos']),0,0,'C');
 $pdf->Ln();
 $pdf->Cell(297,6,"Grand Total : ".rp($grandtotal),0,0,'C');
 $pdf->Ln();
 $pdf->Cell(125,6,"Terima Kasih telah berbelanja di Yasperin",0,0,'L');
 $pdf->Ln();
 $pdf->Cell(125,6,"Tuhan Memberkati",0,0,'L');
 $pdf->Ln(15);
 $pdf->Cell(125,6,"                                                                                                              	      Tanggal Terima :",0,0,'L');
 $pdf->Ln(12);
 $pdf->Cell(125,6,"                                                                                                                         Penerima ",0,0,'L');
 $pdf->Ln(30);
 $pdf->SetFont('Arial','B',12);
 $pdf->Cell(100,6,"                                                                                               (                          )",0,0,'L');
 $pdf->SetFont('Arial','',12);
 $pdf->Ln();
 $pdf->Output('Nota_Yasperin'.date("F Y").'.pdf', 'I');
 ?>