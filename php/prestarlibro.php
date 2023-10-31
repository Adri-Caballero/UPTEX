<?php
include "conexion.php";


$matricula = $_POST['matricula'];
$folio = $_POST['folio'];
$fechaprestamo = $_POST['prestamo'];
$fechaentrega = $_POST['entrega'];
$telefono = $_POST['telefono'];
$email = $_POST['correo'];

$busqueda = mysqli_query($conn, "SELECT * FROM alumnos WHERE matricula = '$matricula'");
  $result = mysqli_query($conn,"SELECT * FROM libros where num_adqui = '$folio'");
  $sql = "INSERT INTO prestamos(matricula,foliolibro,fechaprestamo,fechaentrega,telefono,correo) VALUES 
      ('$matricula','$folio','$fechaprestamo','$fechaentrega'
      ,'$telefono','$email')";
  //If que busca al alumno
if($consulta = mysqli_fetch_array($busqueda)){
  //if que busca el libro
    if($consulta2 = mysqli_fetch_array($result)){
      mysqli_query($conn,$sql);
    ?>
<!DOCTYPE html>
<html>
    <!--estilo de la alerta cuando realiza el prestamo-->
    
    <body>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            swal.fire({
            icon: 'success',
            title: 'Listo...',
            text: 'Prestamo realizado',
            footer: '<a href="../fpdf/pdfprestamo.php">Descargar pdf</a>'
            });
        </script>
        
    </body>
</html>
<?php
// si no encuentra el libro
}else{
    ?>
<!DOCTYPE html>
<html>
    <!--estilo de la alerta cuando no encuentra el libro-->
    <body>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Libro no encontrado'
            })
        </script>
    </body>
</html>
<?php
//Fin de else si no encuentra el libro
  }
  //si no encuentra el alumno hace
}else{
  ?>
<html>
    <!--Estilo de alerta su no encuentra al alumno-->
    <body>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Alumno no encontrado'
            })
        </script>
    </body>
</html>
<?php
//Fin de else si no encuentra al alumno 
}
?>

<!DOCTYPE html>
<html>
<head>
   <meta charset='utf-8'>
   <meta http-equiv='X-UA-Compatible' content='IE=edge'>
   <title>Prestamo de libros</title>
   <meta name='viewport' content='width=device-width, initial-scale=1'>
   <link rel="stylesheet" href="../css/styles.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="shortcut icon" href="../Iconos/favicon.jpg" type="image/x-icon">
  </head>
   <body>
    <div class="container">
 <nav class="navbar navbar-light" style="background-color: #ffffffc0;">
       
       <div class="container-fluid">
         <a class="navbar-brand" href="../html/inicio.html../html/inicio.html"><img src="../imagenes/h1.png" width="250px" height="70"> <b> 
          Universidad Politecnica de Texcoco </b></a> 
       </div>
     </nav>
     <nav class="navbar navbar-light" style="background-color: #e3f2fd00;">
     <ul class="nav nav-pills">
      <ul class="nav nav-pills">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="../html/inicio.html">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" style="background-color: rgba(110, 112, 111, 0.377);" href="../html/prestamo.html">Prestamo</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../php/adeudos.php">Alumnos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../php/libros.php">Libros</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../php/librosvencidos.php">Adeudos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../php/librosentregados.php">Devoluciones</a>
        </li>
          </li>
      </ul>
     </ul>
     </nav>
     <hr color="black">
     <nav>
     <form class="formu" action="../php/prestarlibro.php" method="post">
        <input class="entrada" type="text" name="matricula" placeholder="Ingresa matricula del alumno" required>
        <br><br>
        <input class="entrada" type="text" name="folio" placeholder="Ingresa numero adquisitivo del libro" required> <br><br>
        <input class="entrada" type="phone" name="telefono" placeholder="Ingresa numero telefonico del alumno" required> <br><br>
        <input class="entrada" type="email" name="correo" placeholder="Ingresa correo institucional del alumno" required>
        <br><br>
        <label class="entradafecha">Fecha de prestamo</label>
        <label class="entradafecha">Fecha de entrega</label> <br><br>
        <input class="entradafecha" type="date" name="prestamo" required>
        <input class="entradafecha" type="date" name="entrega" required> <br><br>
        <center><button class="btn btn-outline-success my-2 my-sm-0" onclick="datos" type="submit">Prestar</button>
        </center>

      </form>
    </nav>
    </div>
  </body>
</html>
