<?php


ob_start();

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Libros vencidos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="../css/styles.css">
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />
    <link rel="shortcut icon" href="../Iconos/favicon.jpg" type="image/x-icon">
    <link rel="stylesheet" href="../css/stylestablas.css">
    
  </head>
  <body>
    
    <div id="main-container">
      <table>
        <thead>
          <tr>
            <th scope="col">
              Folio de prestamo
            </th>
            <th scope="col">
              Matricula
            </th>
            <th scope="col">
              Nombre del 
              alumno
            </th>
            <th scope="col">
              Contacto 
            </th>
            <th scope="col">
              Correo 
            </th>
            <th scope="col">
                Fecha de <br />
                prestamo
              </th>
              <th scope="col">
                Fecha de <br />
                vencimiento
              </th>
            <th scope="col">
              Numero adquisitivo
            </th>
            <th scope="col">
              Nombre del <br />
              libro
            </th>
            
          </tr>
        </thead>
        <?php
        include "conexion.php"; 
        $sql = "SELECT * FROM entregas";
        $busqueda = mysqli_query($conn,"$sql"); ?>
        <?php while($row = mysqli_fetch_array($busqueda)){ ?>
          <tr>
          
            <td>PRE-0<?php echo $row['folioentrega'];?></td>
            <td><?php echo $row['matricula']?></td>
            <?php $busqueda2 = mysqli_query($conn,"SELECT * FROM alumnos WHERE matricula = '$row[matricula]'");
                      while($row2 = mysqli_fetch_array($busqueda2)){ ?>
            <td><?php echo $row2['nombre'].(" ").$row2['apellido_paterno'].(" ").$row2['apellido_materno'];} ?></td>
            <td><?php echo $row['telefono'];?></td>
            <td><?php echo $row['correo'];?></td>
            <td><?php echo $row['fechaprestamo']; ?></td>
            <td><?php echo $row['fechaentrega']; ?></td>
            <td><?php echo $row['foliolibro']; ?></td>
            <td><?php $busqueda3 = mysqli_query($conn,"SELECT * FROM libros WHERE num_adqui = '$row[foliolibro]'");
                      while($row3 = mysqli_fetch_array($busqueda3)){ 
                        echo $row3['titulolibro'];
                      }?></td>
        <?php } ?>
          </tr>
      </table>
    </div>
  </body>
</html>
<?php
$html=ob_get_clean();
//echo $html;


require_once '../dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();

$options = $dompdf->getOptions();
$options->set(array('isRemoteEnable'=> true));
$dompdf->setOptions($options);
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation landscape
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser

$dompdf->stream("Devoluciones".(" ").date("d-m-Y").".pdf", array("Attachment"=> true));
          

?>