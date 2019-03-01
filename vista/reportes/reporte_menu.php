<?php
  date_default_timezone_set("America/Caracas");
  session_start();

  require("../../config/conexion.php");
  extract($_REQUEST);

  require('../../fpdf/fpdf.php');

class PDF extends FPDF {
  function Header() {
    $this->SetFont('Times','B',12);
    $this->Image('../../img/log.jpg',10,10,30,30);
    $this->Ln(10);
    $this->Cell(0,0,utf8_decode('REPÚBLICA BOLIVARIANA DE VENEZUELA'),0,0,'C');    
    $this->Ln(1); 
    $this->Cell(0,8,utf8_decode('CENTRO DE ALIMENTACIÓN "PUEBLO SOCIALISTA"'),0,0,'C');
    $this->Ln(1); 
    $this->Cell(0,16,utf8_decode('EL CONSEJO - ESTADO ARAGUA'),0,0,'C');
    $this->Ln(0); 
 
    $this->SetFont('Times','B',18);
    $this->Ln(10);
    $this->Cell(0,40,utf8_decode('MENÚ DEL DÍA'),0,0,'C');
    $this->Ln(1);

  }
  function Footer() {
    $this->SetY(-60);
    $this->SetFont('Times','',10);
    $this->Ln(20); 
    $this->Cell(0,60,utf8_decode('Trapiche del Medio, Calle Principal # 43, El Consejo Estado Aragua'),0,0,'C');
    $this->Ln(4); 
    $this->Cell(0,60,utf8_decode('Telf.: 0244-511.15.98 - Código Postal 2111 '),0,0,'C');
    $this->Ln(0);
    $this->SetX(180);
    $this->Cell(30,60,utf8_decode('Página: '.$this->PageNo().'/{nb}'),0,0,'R');
 }
}

$pdf=new PDF('P', 'mm', 'A4');
$pdf -> AliasNbPages();
$pdf->AddPage();
    $sql= "SELECT * FROM menu_comida WHERE fecha='$fecha' ";
    $consulta = mysqli_query($conectar,$sql) or die ("ERROR 22 ".mysqli_error());

    while ($row=mysqli_fetch_array($consulta)) {
      $fecha=date("d/m/Y", strtotime($row["fecha"]));

      $pdf->SetFont('Times','B',12);
      $pdf->Cell(350,45," Fecha: ".date('d/m/Y')." ",0,0,'C');
      $pdf->Ln(4); 
      $pdf->SetX(20); 
      $pdf->SetY(80);

      $pdf->SetFont('Times','',26);
      $pdf->Sety(88);
      $pdf->Cell(186,30,utf8_decode('Plato: '.$row['plato'].' '),0,0,'L');
      $pdf->Ln();
      $pdf->Cell(186,30,utf8_decode('Jugo: '.$row['jugo'].''),0,0,'L');
      $pdf->Ln();
      $pdf->Cell(186,30,utf8_decode('Merienda: '.$row['merienda'].''),0,0,'L'); 
      $pdf->Ln();

    }
    $pdf->Ln(1); 
    $pdf->Output();
?>