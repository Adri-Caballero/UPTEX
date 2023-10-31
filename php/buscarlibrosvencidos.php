<?php
include "conexion.php";
$folio = $_POST['folio'];
$busqueda = mysqli_query($conn, "SELECT * FROM prestamos WHERE matricula='$folio' OR folioprestamo='$folio'");
    
if($consulta = mysqli_fetch_array($busqueda)){ 
}else{?>
    <html>
      <body>
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script src="js/sweetalert.js"></script>
      <script>
        Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Adeudo no encontrado'
        })
      </script>
      </body>
   </html>
<?php
}
?>

<!DOCTYPE html>
<html>
  <div class="container" style="box-shadow: 0px 0px 50px rgba(15, 14, 14, 0.856);">
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
    <nav class="navbar navbar-light" style="background-color: #0f0f0f3b;">
      <div class="container-fluid">
        <a class="navbar-brand" href="../html/inicio.html"><img src="../imagenes/h1.png" width="250px" height="70" /> <b> Universidad
          Politecnica de Texcoco</b></a
        >
      </div>
    </nav>
    <nav class="navbar navbar-light" style="background-color: #a5979725;">
      <ul class="nav nav-pills">
        <ul class="nav nav-pills">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../html/inicio.html">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../html/prestamo.html">Prestamo</a>
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
        </ul>
        
        <li>
          <form class="form-inline" action="../php/buscarlibrosvencidos.php" method="post">
            <input class="form-control mr-sm-2" name="folio" type="search" placeholder="Ingrese folio o nombre del libro" aria-label="Search" required>
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
              Buscar
            </button>
          </form>
        </li>
      </ul>
    </nav>

    <hr color="black">
    <div id="main-container">
      <table>
        <thead>
          <tr>
            
            <th scope="col">
              Nombre del 
              alumno
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
              Folio del <br />
              libro
            </th>
            <th scope="col">
              Nombre del <br />
              libro
            </th>
            <th scope="col">
              Entregar 
            </th>
            
          </tr>
        </thead>
        <?php $busqueda2 = mysqli_query($conn, "SELECT * FROM prestamos WHERE matricula='$folio' OR folioprestamo='$folio'");
        while($consulta2 = mysqli_fetch_array($busqueda2 )){?>
          <tr>
            <td><?php echo $consulta2['matricula']; ?></td>
            <td><?php echo $consulta2['fechaprestamo']; ?></td>
            <td><?php echo $consulta2['fechaentrega']; ?></td>
            <td><?php echo $consulta2['foliolibro']; ?></td>
            <td>---<?php //echo $row['matricula'];?></td>
            <td><button>Entregar</button></td>
          </tr>
          <?php } ?>
      </table>
      
    </div>
    <br>
    <div style="background-color:#0f0f0f3b;">
  <footer class="py-4">
    <div class="container">
      <p class="m-0 text-center text-black">
        &copy; Sistema de biblioteca elaborado por: Angeles Antonio Misael, Cordova caballero Carlos Adrian, Cruz Lopez
        Susana || TESCHI
      </p>
    </div>
  </footer>
</div>
</div>

  </body>
</html>