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
    $this->Cell(0,40,utf8_decode('LISTA DE PERSONAS CENSADAS'),0,0,'C');
    $this->Ln(20);

    $this->SetX(25);
    $this->SetY(25);
    $this->SetFont('Times','B',10);

    $this->Cell(350,50," Fecha: ".date('d/m/Y')." ",0,0,'C');
    $this->Ln(4); 
    $this->SetX(25); 
    $this->SetY(55);
    $this->Cell(23,7,utf8_decode('Cédula'),1,0,'C');
    $this->Cell(25,7,'Nombre',1,0,'C');
    $this->Cell(25,7,utf8_decode('Apellido'),1,0,'C');
    $this->Cell(25,7,utf8_decode('Sexo'),1,0,'C');
    $this->Cell(28,7,utf8_decode('Estado Civil'),1,0,'C');
    $this->Cell(28,7,utf8_decode('Teléfono'),1,0,'C');
    $this->Cell(35,7,utf8_decode('Fecha de Registro'),1,0,'C');
    $this->SetFont('Times','',10);
    $this->Ln(); 
  }
  function Footer() {
    $this->SetY(-60);
    $this->SetFont('Times','',10);
    $this->Ln(20); 
    $this->SetX(100);
    $this->Cell(10,60,utf8_decode('Trapiche del Medio, Calle Principal # 43, El Consejo Estado Aragua'),0,0,'C');
    $this->Ln(4); 
    $this->SetX(100);
    $this->Cell(10,60,utf8_decode('Telf.: 0244-511.15.98 - Código Postal 2118 '),0,0,'C');
    $this->Ln(0);
    $this->SetX(100);
    $this->Cell(110,60,utf8_decode('Página: '.$this->PageNo().'/{nb}'),0,0,'R');
 }
}

$pdf=new PDF('P', 'mm', 'A4');
$pdf -> AliasNbPages();
$pdf->AddPage();
    $sql="SELECT * FROM personas ORDER BY cedula ASC";
    $consulta=mysqli_query($conectar,$sql) or die ("ERROR en la consulta ". mysqli_error($conectar));
    while ($fila=mysqli_fetch_array($consulta)) {
      $fecha=date("d/m/Y", strtotime($fila["fecha_registro"]));
      $pdf->Cell(23,7,utf8_decode($fila['cedula']),1,0,'C');
      $pdf->Cell(25,7,utf8_decode($fila['nombre'].' '),1,0,'C');
      $pdf->Cell(25,7,utf8_decode($fila['apellido'].' '),1,0,'C');
      $pdf->Cell(25,7,utf8_decode($fila['sexo']),1,0,'C');
      $pdf->Cell(28,7,utf8_decode($fila['estado_civil']),1,0,'C');
      $pdf->Cell(28,7,utf8_decode($fila['telefono']),1,0,'C');
      $pdf->Cell(35,7,utf8_decode($fecha),1,0,'C');
      $pdf->SetFont('Times','',10);
      $pdf->Ln(); 
    }
    $pdf->Ln(1); 
    $pdf->Output();
?>