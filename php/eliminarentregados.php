<?php
    include('conexion.php');
    $sql="DELETE FROM entregas";


    $eliminar=mysqli_query($conn,$sql);

?>
<html>
        <body>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="js/sweetalert.js"></script>
            <script>
                Swal.fire({
                icon: 'success',
                title: 'Listo...',
                text: 'La tabla se elimino',
            })
            </script>
        </body>
</html>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Libros entregados</title>
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
    <div class="container" style="box-shadow: 0px 0px 50px rgba(15, 14, 14, 0.856);">
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
            <a class="nav-link" aria-current="page" href="../html/inicio.html">Inicio</a>
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
            <a class="nav-link " href="../php/librosvencidos.php">Adeudos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" style="background-color: rgba(110, 112, 111, 0.377);" href="../php/librosentregados.php">Devoluciones</a>
          </li>
        </ul>
        
       
      </ul>
    </nav>

    <hr color="black">
    <div id="main-container">
      <table>
        <thead>
          <tr>
            <th scope="col">
              Folio de entrega
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
                entrega
              </th>
            <th scope="col">
              Numero adquisitivo
            </th>
            <th scope="col">
              Nombre del <br />
              libro
            </th>
            <th scope="col">
              Fecha de entrega
            </th>
          </tr>
        </thead>
        <?php   
        $busqueda = mysqli_query($conn, "SELECT * FROM entregas");
        while($row = mysqli_fetch_array($busqueda)){?>
          <tr>
            <td>PRE-0<?php echo $row['folioprestamo'];?></td>
            <td><?php echo $row['matricula']?></td>
        <?php
        $busqueda2 = mysqli_query($conn,"SELECT * FROM alumnos WHERE matricula = '$row[matricula]'");
          while($row2 = mysqli_fetch_array($busqueda2)){?>
            <td><?php echo $row2['nombre'].(" ").$row2['apellido_paterno'].(" ").$row2['apellido_materno'];}?></td>  
            <td><?php echo $row['telefono'];?></td>
            <td><?php echo $row['correo'];?></td>
            <td><?php echo $row['fechaprestamo']; ?></td>
            <td><?php echo $row['fechaentrega']; ?></td>
            <td><?php echo $row['foliolibro']; ?></td>
        <?php 
        $busqueda3 = mysqli_query($conn,"SELECT * FROM libros WHERE num_adqui = '$row[foliolibro]'");
          while($row3 = mysqli_fetch_array($busqueda3)){?> 
              <td><?php echo $row3['titulolibro']; }?></td>
              <td>Entregado</td>
              <td><?php echo $row['fechaentrega']?></td>
        
        <?php
        }
        ?>
        <div style="text-align: left;">
          <a href="../php/pdfdevoluciones.php">Descargar devoluciones</a>
          </div>
          <div style="text-align: right;">
          <a href="../php/eliminarentregados.php">Eliminar datos</a>
          </div>
      </table>
    </div>
    <br>
<div style="background-color:#0f0f0f3b;">
  <footer class="py-4">
    <div class="container">
      <p class="m-0 text-center text-white">
        &copy; Sistema de biblioteca elaborado por: Angeles Antonio Misael, Cordova caballero Carlos Adrian, Cruz Lopez
        Susana || TESCHI
      </p>
    </div>
  </footer>
</div>
    </div>
  </body>
</html>