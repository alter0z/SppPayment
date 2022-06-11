<?php 
  require '../../lib/fpdf184/fpdf.php';
  require '../connection/connection.php';

  class PDF extends FPDF {
    // Page header
    function Header() {
      // Logo
      // $this->Image('logo.png',10,-1,70);
      $this->SetFont('Arial','B',13);
      // Move to the right
      $this->Cell(125);
      // Title
      $this->Cell(80,10,'Faktur',1,0,'C');
      // Line break
      $this->Ln(20);
    }
 
    // Page footer
    function Footer() {
      // Position at 1.5 cm from bottom
      $this->SetY(-15);
      // Arial italic 8
      $this->SetFont('Arial','I',8);
      // Page number
      $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
  }
 
  if (isset($_POST['print'])) {
    // store prcedure
    mysqli_query($conn,"create or replace procedure printInvoice(in getNis varchar(64))
    begin
    SELECT a.nis, b.student_name, b.class, b.jenis_kelamin, c.fullname, a.spp_status, a.tanggal, a.admin FROM transaksi as a join student as b on a.nis = b.nis join wclass as c on b.class = c.class where a.nis = getNis;
    end");

    // create view
    mysqli_query($conn,"create or replace view view_invoice as SELECT a.nis, b.student_name, b.class, b.jenis_kelamin, c.fullname, a.spp_status, a.tanggal, a.admin FROM transaksi as a join student as b on a.nis = b.nis join wclass as c on b.class = c.class");

    // $db = new dbObj();
    // $connString =  $db->getConnstring();
    $display_heading = array('nis' => 'NIS', 'student_name' => 'Nama', 'class' => 'Kelas', 'jenis_kelamin' => 'Jenis kelamin', 'fullname' => 'Wali kelas', 'spp_status' => 'Status', 'tanggal' => 'Tanggal', 'admin' => 'Admin');
    
    // $result = mysqli_query($conn, "call printInvoice($_POST[nis])") or die("database error:". mysqli_error($conn));
    $result = mysqli_query($conn, "SELECT a.nis, b.student_name, b.class, b.jenis_kelamin, c.fullname, a.spp_status, a.tanggal, a.admin FROM transaksi as a join student as b on a.nis = b.nis join wclass as c on b.class = c.class where a.nis = $_POST[nis]") or die("database error:". mysqli_error($conn));
    $header = mysqli_query($conn, "SHOW columns FROM view_invoice");

    $getArray = mysqli_fetch_assoc($result);
    
    $pdf = new PDF('L','mm', 'legal');

    //header
    $pdf->AddPage();

    //foter page
    $pdf->AliasNbPages();
    $pdf->SetFont('Arial','B',12);

    foreach($header as $heading) {
      $pdf->Cell(40,12,$display_heading[$heading['Field']],1);
    }

    foreach($result as $row) {
      $pdf->Ln();
      foreach($row as $column)
        $pdf->Cell(40,12,$column,1);
    }

    $pdf->Output('Faktur '.$getArray['student_name'].'.pdf', 'I');
  }
?>