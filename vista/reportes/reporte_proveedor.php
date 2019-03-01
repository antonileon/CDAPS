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
 
    $this->SetFont('Times','BU',12);
    $this->Ln(4);
    $this->Cell(0,40,utf8_decode('LISTA DE PROVEEDORES'),0,0,'C');
    $this->Ln(1);

    $this->SetX(30);
    $this->SetY(30);
    $this->SetFont('Times','B',12);

    $this->Cell(515,50," Fecha: ".date('d/m/Y')." ",0,0,'C');
    $this->Ln(4); 
    $this->SetX(30); 
    $this->SetY(60);
    $this->Cell(10,7,'ID',1,0,'C');
    $this->Cell(30,7,utf8_decode('Rif'),1,0,'C');
    $this->Cell(65,7,'Nombre',1,0,'C');
    $this->Cell(35,7,utf8_decode('Teléfono'),1,0,'C');
    $this->Cell(65,7,utf8_decode('Email'),1,0,'C');
    $this->Cell(30,7,utf8_decode('Estado'),1,0,'C');
    $this->Cell(40,7,utf8_decode('Fecha de Registro'),1,0,'C');
    $this->SetFont('Times','',12);
    $this->Ln(); 
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
    $this->Cell(110,60,utf8_decode('Página: '.$this->PageNo().'/{nb}'),0,0,'R');
 }
}

$pdf=new PDF('L', 'mm', 'A4');
$pdf -> AliasNbPages();
$pdf->AddPage();
    $sql="SELECT * FROM proveedores ORDER BY id_proveedores DESC";
    $consulta=mysqli_query($conectar,$sql) or die ("ERROR en la consulta ". mysqli_error($conectar));
    while ($fila=mysqli_fetch_array($consulta)) {
      $pdf->Cell(10,7,utf8_decode($fila['id_proveedores']),1,0,'C');
      $pdf->Cell(30,7,utf8_decode($fila['tipo_rif'].'-'.$fila['rif']),1,0,'C');
      $pdf->Cell(65,7,utf8_decode($fila['nombre_proveedor'].' '),1,0,'C');
      $pdf->Cell(35,7,utf8_decode($fila['telefono'].' '),1,0,'C');
      $pdf->Cell(65,7,utf8_decode($fila['email'].' '),1,0,'C');
      $pdf->Cell(30,7,utf8_decode($fila['estatus']),1,0,'C');
      $pdf->Cell(40,7,utf8_decode($fila['fecha_registro']),1,0,'C');
      $pdf->SetFont('Times','',12);
      $pdf->Ln(); 
    }
    $pdf->Ln(1); 
    $pdf->Output();
?>