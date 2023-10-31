<?php
require('./fpdf.php');
date_default_timezone_set("Mexico/General");
class PDF extends FPDF
{

   // Cabecera de página
   function Header()
   {
      include '../php/conexion.php';//llamamos a la conexion BD

      $consulta_info = $conn->query(" select *from prestamos");//traemos datos de la empresa desde BD
      $dato_info = $consulta_info->fetch_object();
      $this->Image('logo1.png', 15, 4, 50); //logo de la empresa,moverDerecha,moverAbajo,tamañoIMG
      $this->Image('logo.png', 170, 1, 20);
      $this->SetFont('Arial', 'B', 19); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(45); // Movernos a la derecha
      
      
      $this->SetTextColor(0, 0, 0); //color
      //creamos una celda o fila
      $this->Cell(110, 20, utf8_decode('Comprobante de Prestamo'), 0, 1, 'C', 0); // AnchoCelda,AltoCelda,titulo,borde(1-0),saltoLinea(1-0),posicion(L-C-R),ColorFondo(1-0)
      $this->Ln(3); // Salto de línea
      $this->SetTextColor(103); //color
   
      $sql = "SELECT * FROM prestamos WHERE folioprestamo=(SELECT max(folioprestamo) FROM prestamos)";
      $busqueda = mysqli_query($conn,$sql);

      while($row=mysqli_fetch_array($busqueda)){

      $this->Cell(10);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(96, 10, utf8_decode("Folio: PRE-0").$row["folioprestamo"], 0, 0, '', 0);
      $this->Ln(10);
      

      $this->Cell(10);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(96, 10, utf8_decode("Datos del Alumno "), 0, 0, '', 0);
      $this->Ln(10);
      

      $this->Cell(10);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("Matricula : ").$row["matricula"], 0, 0, '', 0);
      $this->Ln(5);
      
      $busqueda2 = mysqli_query($conn, "SELECT * FROM alumnos WHERE matricula = '$row[matricula]'");
      While($row2=mysqli_fetch_array($busqueda2)){
      $this->Cell(10);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(59, 10, utf8_decode("Nombre : ").$row2['nombre'].(" ") .$row2[ 'apellido_paterno'].(" ") .$row2[ 'apellido_materno'], 0, 0, '', 0);
      //$this->Cell(59, 10, utf8_decode($dato_info->folioprestamo), 0, 0, '', 0);
      $this->Ln(5);
      
      $this->Cell(10);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("Telefono : ").$row["telefono"], 0, 0, '', 0);
      $this->Ln(5);

      $this->Cell(10);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("Correo : ").$row["correo"], 0, 0, '', 0);
      $this->Ln(5);

      $this->Cell(10);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(59, 10, utf8_decode("grupo : ").$row2["grupo"], 0, 0, '', 0);
      $this->Ln(10);
      }
      $this->Cell(10);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(96, 10, utf8_decode("Datos del Libro"), 0, 0, '', 0);
      $this->Ln(10);
      
      $this->Cell(10);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(59, 10, utf8_decode("Numero Adquisitivo : ").$row["foliolibro"], 0, 0, '', 0);
      $this->Ln(5);

      $busqueda3 = mysqli_query($conn, "SELECT * FROM libros WHERE num_adqui = '$row[foliolibro]'");
      while ($row3 = mysqli_fetch_array($busqueda3)) {

      $this->Cell(10);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("Titulo del libro : ").$row3['titulolibro'], 0, 0, '', 0);
      $this->Ln(5);

      
      $this->Cell(10);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("Autor : ").$row3['autor'], 0, 0, '', 0);
      $this->Ln(5);
      }

      $this->Cell(10);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("Fecha de prestamo : ").$row["fechaprestamo"], 0, 0, '', 0);
      $this->Ln(5);
       $this->Cell(10);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("Fecha de vencimiento : ").$row["fechaentrega"], 0, 0, '', 0);
      $this->Ln(5);
      }
      /* TITULO DE LA TABLA */
      //color
      $this->SetTextColor(228, 100, 0);
      $this->Cell(50); // mover a la derecha
      $this->SetFont('Arial', 'B', 15);
      /*$this->Cell(100, 10, utf8_decode("REPORTE DE HABITACIONES "), 0, 1, 'C', 0);*/
      $this->Ln(7);

      /* CAMPOS DE LA TABLA */
      //color
   
   }

   // Pie de página
   function Footer()
   {
      /*$this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C'); //pie de pagina(numero de pagina)*/
      $this->SetY(25); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, cursiva, tamañoTexto
      $hoy = date('d/m/Y');
      $this->Cell(355, 10, utf8_decode($hoy), 0, 0, 'C'); // pie de pagina(fecha de pagina)
   }
}

//include '../../recursos/Recurso_conexion_bd.php';
//require '../../funciones/CortarCadena.php';
/* CONSULTA INFORMACION DEL HOSPEDAJE */
//$consulta_info = $conexion->query(" select *from hotel ");
//$dato_info = $consulta_info->fetch_object();

$pdf = new PDF();
$pdf->AddPage(); /* aqui entran dos para parametros (horientazion,tamaño)V->portrait H->landscape tamaño (A3.A4.A5.letter.legal) */
$pdf->AliasNbPages(); //muestra la pagina / y total de paginas

$i = 0;
$pdf->SetFont('Arial', '', 12);
$pdf->SetDrawColor(163, 163, 163); //colorBorde

/*$consulta_reporte_alquiler = $conexion->query("  ");*/

/*while ($datos_reporte = $consulta_reporte_alquiler->fetch_object()) {      
   }*/
$i = $i + 1;
/* TABLA */



//$pdf->Output('Prueba.pdf', 'I');//nombreDescarga, Visor(I->visualizar - D->descargar)
include '../php/conexion.php';
$sql = "SELECT * FROM prestamos WHERE folioprestamo=(SELECT max(folioprestamo) FROM prestamos)";
$busqueda = mysqli_query($conn,$sql);
          while ($row = mysqli_fetch_array($busqueda)){
//$pdf->stream("Comprobante".(" ").$row['matricula'].".pdf", array("Attachment"=> true));
   $pdf->Output('Comprobante'.(" ").$row['matricula'].'.pdf', 'D');//nombreDescarga, Visor(I->visualizar - D->descargar)
}
