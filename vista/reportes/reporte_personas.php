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
    $this->Cell(0,40,utf8_decode('PLANILLA DE CENSO'),0,0,'C');
    $this->Ln(1);

    $this->SetX(30);
    $this->SetY(30);
    $this->SetFont('Times','B',12);
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
    $sql= "SELECT * FROM personas INNER JOIN datos_personas ON personas.id_personas = datos_personas.id_datos_personas WHERE personas.id_personas = '$id' ";
    $consulta = mysqli_query($conectar,$sql) or die ("ERROR 22 ".mysqli_error());

    while ($row=mysqli_fetch_array($consulta)) {
      $fecha=date("d/m/Y", strtotime($row["fecha_registro"]));

      $pdf->Sety(13);
      $pdf->SetX(150);
      $pdf->SetX(175);      
      $pdf->Cell(25,30,'FOTO',1,0,'C');   
      $pdf->Sety(20);
      $pdf->Ln(3); 
      $pdf->SetX(20);
      $pdf->SetFont('Times','B',12);
      
      $pdf->SetFont('Times','B',12);
      $pdf->Cell(310,50," Fecha: ".date('d/m/Y')." ",0,0,'C');
      $pdf->Ln(4); 
      $pdf->SetX(20); 
      $pdf->SetY(55);

      $pdf->SetFont('Times','B',12);
      $pdf->Cell(186,8,'Datos Personales',1,0,'C'); 
      $pdf->SetFont('Times','',12);
      $pdf->Sety(63);
      $pdf->Cell(62,8,utf8_decode('Cédula: '.$row['cedula'].' '),1,0,'L'); 
      $pdf->Cell(62,8,utf8_decode('Apellido: '.$row['apellido'].''),1,0,'L');
      $pdf->Cell(62,8,utf8_decode('Nombre: '.$row['nombre'].''),1,0,'L'); 
      $pdf->Ln();
      $pdf->Cell(93,8,utf8_decode('Estado Civil: '.$row['estado_civil'].''),1,0,'L');
      $pdf->Cell(93,8,utf8_decode('Sexo: '.$row['sexo'].''),1,0,'L');
      $pdf->Ln();
      $pdf->Cell(93,8,utf8_decode('Telefono: '.$row['telefono'].''),1,0,'L');
      $pdf->Cell(93,8,utf8_decode('Lugar de Nacimiento: '.$row['lugar_nacimiento'].''),1,0,'L');
      $pdf->Ln();
      $pdf->Cell(93,8,utf8_decode('Fecha de Nacimiento: '.$row['fecha_nacimiento'].''),1,0,'L');
      $pdf->Cell(93,8,utf8_decode('Nivel de Estudio: '.$row['nivel_estudio'].''),1,0,'L');
      $pdf->Ln();
      $pdf->Cell(186,8,utf8_decode('Profesion: '.$row['profesion'].''),1,0,'L');
      $pdf->Ln();
      $pdf->Cell(93,8,utf8_decode('Numero de Hijo: '.$row['num_hijos'].''),1,0,'L');
      $pdf->Cell(93,8,utf8_decode('Personas a Cargo: '.$row['personas_cargo'].''),1,0,'L');
      $pdf->Ln();
      $pdf->Cell(186,8,utf8_decode('Discapacidad: '.$row['discapacidad'].''),1,0,'L');     
      $pdf->Ln(); 
 
      $pdf->SetY(130);
      $pdf->SetFont('Times','B',12);
      $pdf->Cell(186,8,'Datos de Domicilio',1,0,'C'); 
      $pdf->SetFont('Times','',12);
      $pdf->Sety(130);
      $pdf->Ln();
      $pdf->Cell(93,8,utf8_decode('Estado: '.$row['estado'].''),1,0,'L');
      $pdf->Cell(93,8,utf8_decode('Ciudad: '.$row['ciudad'].''),1,0,'L');
      $pdf->Ln();
      $pdf->Cell(93,8,utf8_decode('Municipio: '.$row['municipio'].''),1,0,'L');
      $pdf->Cell(93,8,utf8_decode('Parroquia: '.$row['parroquia'].''),1,0,'L');
      $pdf->Ln();
      $pdf->Cell(186,10,utf8_decode('Direccion: '.$row['direccion'].''),1,0,'L');
      $pdf->Ln();
      $pdf->Cell(93,8,utf8_decode('Tipo de Vivenda: '.$row['tipo_vivienda'].''),1,0,'L');
      $pdf->Cell(93,8,utf8_decode('Condicion de la Viviendad: '.$row['condicion_vivienda'].''),1,0,'L');
      $pdf->Ln(); 

      $pdf->SetY(182);
      $pdf->SetFont('Times','B',12);
      $pdf->Cell(186,8,'   Datos Financiero',1,0,'C');
      $pdf->SetFont('Times','',12);
      $pdf->Sety(182);
      $pdf->Ln();
      $pdf->Cell(93,8,utf8_decode('¿Trabaja?: '.$row['trabaja'].''),1,0,'L');
      $pdf->Cell(93,8,utf8_decode('Fecha de Ingreso: '.$row['fecha_ingreso'].''),1,0,'L');
      $pdf->Ln();
      $pdf->Cell(186,8,utf8_decode('Nombre de la Empresa: '.$row['nombre_empresa'].''),1,0,'L');
      $pdf->Ln();
      $pdf->Cell(93,8,utf8_decode('Cargo de Trabajo: '.$row['cargo_trabajo'].''),1,0,'L');
      $pdf->Cell(93,8,utf8_decode('Ingreso Fijo: '.$row['ingreso_fijo'].''),1,0,'L');
      $pdf->Ln();
      $pdf->Cell(93,8,utf8_decode('Otros Ingresos: '.$row['otros_ingresos'].''),1,0,'L');
      $pdf->Cell(93,8,utf8_decode('Gasto Total: '.$row['gasto_total'].''),1,0,'L');
      $pdf->Ln(6); 
 

      $pdf->Ln(28); 
      $pdf->SetFont('Times','',12);
      $pdf->Cell(182,5,utf8_decode('Fecha de Registro:   '.$fecha.'                                                      _____________________'),0,0,'C');
      $pdf->Ln(); 
      $pdf->Cell(182,5,utf8_decode('                                                                                                           FIRMA'),0,0,'C');
      $pdf->Ln(30); 
    }
    $pdf->Ln(1); 
    $pdf->Output();
?>