<?php

require('./fpdf.php');

class PDF extends FPDF
{

   // Cabecera de página
   function Header()
   {
      include '../../php/conexion.php';//llamamos a la conexion BD

      $consulta_info = $conexion->query(" select *from prestamos");//traemos datos de la empresa desde BD
      $dato_info = $consulta_info->fetch_object();
      $this->Image('logo1.png', 0, 4, 50); //logo de la empresa,moverDerecha,moverAbajo,tamañoIMG
      $this->SetFont('Arial', 'B', 19); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(45); // Movernos a la derecha
      
      $this->SetTextColor(0, 0, 0); //color
      //creamos una celda o fila
      $this->Cell(110, 20, utf8_decode('Comprobante de Prestamo'), 0, 1, 'C', 0); // AnchoCelda,AltoCelda,titulo,borde(1-0),saltoLinea(1-0),posicion(L-C-R),ColorFondo(1-0)
      $this->Ln(3); // Salto de línea
      $this->SetTextColor(103); //color

      /* UBICACION */
      $this->Cell(10);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(96, 10, utf8_decode("Datos del Alumno "), 0, 0, '', 0);
      $this->Ln(10);
      
      /* TELEFONO */
      $this->Cell(10);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(59, 10, utf8_decode("Nombre : "), 0, 0, '', 0);
      $this->Cell(59, 10, utf8_decode($dato_info->folioprestamo), 0, 0, '', 0);
      $this->Ln(5);

      /* COREEO */
      $this->Cell(10);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("Matricula : "), 0, 0, '', 0);
      $this->Ln(5);

      /* TELEFONO */
      $this->Cell(10);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("Telefono : "), 0, 0, '', 0);
      $this->Ln(5);

      $this->Cell(10);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(59, 10, utf8_decode("grupo : "), 0, 0, '', 0);
      $this->Ln(10);

      $this->Cell(10);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(96, 10, utf8_decode("Datos del Libro"), 0, 0, '', 0);
      $this->Ln(10);
      
      /* TELEFONO */
      $this->Cell(10);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(59, 10, utf8_decode("Numero Adquisitivo : "), 0, 0, '', 0);
      $this->Ln(5);

      /* COREEO */
      $this->Cell(10);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("Titulo del libro : "), 0, 0, '', 0);
      $this->Ln(5);

      /* TELEFONO */
      $this->Cell(10);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("Autor : "), 0, 0, '', 0);
      $this->Ln(5);

      $this->Cell(10);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("Fecha de prestamo : "), 0, 0, '', 0);
      $this->Ln(5);
       $this->Cell(10);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("Fecha de entrega : "), 0, 0, '', 0);
      $this->Ln(5);

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
      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C'); //pie de pagina(numero de pagina)

      $this->SetY(-15); // Posición: a 1,5 cm del final
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



$pdf->Output('Prueba.pdf', 'I');//nombreDescarga, Visor(I->visualizar - D->descargar)


           include 'conexion.php';
          $sql = "SELECT * FROM prestamos WHERE folioprestamo=(SELECT max(folioprestamo) FROM prestamos)"; 
          $busqueda = mysqli_query($conn,$sql);
          while ($row = mysqli_fetch_array($busqueda)){
          ?>
            <th class="texto ">Folio</th>
            <td>PRE-0<?php echo $row['folioprestamo']; ?></td>
        </tr>
      </table>
      <p style="Text-align:center"> <b class="texto"> Comprobante de Prestamo</b></p>
      <table >
        <tr>
            <th class="texto">Datos del alumno</th>
        </tr>
        <td><br></td>
        <tr>
            <th><p>Matricula</p></th>
            <td colspan="2"><?php echo $row['matricula']?></td>
            <td colspan="5"></td>
            <?php $busqueda2 = mysqli_query($conn, "SELECT * FROM alumnos WHERE matricula = '$row[matricula]'");
              while($row2 = mysqli_fetch_array($busqueda2)){ ?> 
            <th colspan="2">Nombre</th>
            <td colspan="2"><?php echo $row2['nombre'].(" ") .$row2[ 'apellido_paterno'].(" ") .$row2[ 'apellido_materno'];?></td>
             
          </tr>
        <tr>
          <th class="texto2">Telefono</th>
          <td colspan="2"><?php echo $row['telefono'];?></td>
          <td colspan="5"></td>
          <th colspan="2">Grupo</th>
          <td colspan="3"><?php echo $row2['grupo'] ?></td>
          <?php } ?>
      </tr>
      <td colspan="2"><br></td>
    </table>
    <table>
      <tr>
        
        <th class="texto">Datos del Libro</th>
        
    </tr>
    <td><br></td>
    
      <tr>
      <th colspan="2">Numero Adquisitivo</th>
      <td colspan="2"><?php echo $row['foliolibro'] ?></td>
      <td class="espacio"></td>
      <?php $busqueda3 = mysqli_query($conn, "SELECT * FROM libros WHERE num_adqui = '$row[foliolibro]'");
                while ($row3 = mysqli_fetch_array($busqueda3)) { ?>
      <th colspan="2">Titulo del libro</th>
      <td colspan="2"><?php echo $row3['titulolibro'] ?></td>
  </tr>
  <tr>
    <th colspan="2">Autor</th>
    <td colspan="2"><?php echo $row3['autor'] ?></td>
    <?php } ?>
</tr>
<tr>
  <th colspan="2">Fecha de Prestamo</th>
  <td colspan="2"><?php echo $row['fechaprestamo'] ?></td>
  <td colspan="3"></td>
  <th colspan="2">Fecha de Vencimiento</th>
  <td><?php echo $row['fechaentrega'] ?></td>
</tr>
          <?php } ?>
      </table>
    </div>
    <table>
        <tr>
		</table>
    </div>
    </div>
    
  </body>
</html>
<?php
$html=ob_get_clean();
//echo $html;

use Dompdf\Dompdf;
require_once '../dompdf/autoload.inc.php';


$dompdf = new Dompdf();

$options = $dompdf->getOptions();
$options->set(array('isRemoteEnable'=> true));
$dompdf->setOptions($options);
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'letter');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$busqueda = mysqli_query($conn,$sql);
          while ($row = mysqli_fetch_array($busqueda)){
$dompdf->stream("Comprobante".(" ").$row['matricula'].".pdf", array("Attachment"=> false));
          }
?>