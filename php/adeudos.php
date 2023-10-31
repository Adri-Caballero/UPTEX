<?php
include "conexion.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Consultas</title>
    
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
    <nav class="navbar navbar-light"style="background-color: #0f0f0f3b;">
      <div class="container-fluid">
        <a class="navbar-brand" href="../html/inicio.html"><img src="../imagenes/h1.png" width="250px" height="70" /> <b> Universidad
          Politecnica de Texcoco</b></a>
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
            <a class="nav-link active" style="background-color: rgba(110, 112, 111, 0.377);" href="../php/adeudos.php">Alumnos</a>
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
        <li>
          <form class="form-inline" action="../php/buscaralumno.php" method="post">
            <input class="form-control mr-sm-2" type="search" name="matricula" placeholder="Ingresa matricula" aria-label="Search" required>
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
              Buscar
            </button>
          </form>
        </li>
      </ul>
    </nav>
    <hr color="black">

    <div id="main-container">
      <div id="ta">
    <table>
        <thead>
				<tr>
					<th scope="col">Matricula</th>
          <th scope="col">Nombre del alumno</th>
          <th scope="col">Status</th>
          <th scope="col">Carrera</th>
          <th scope="col">Grupo</th>
          
				</tr>
        </thead>
        <tr>
            <?php
             $busqueda2 = mysqli_query($conn, "SELECT * FROM alumnos");
             while($row2 = mysqli_fetch_array($busqueda2)){ ?>
             <tr>
             <td><?php echo $row2['matricula']?></td>
              <td> <?php echo $row2['nombre'].(" ") .$row2[ 'apellido_paterno'].(" ") .$row2[ 'apellido_materno'];?></td>
              <td><?php echo $row2['statu']?></td>
              <td><?php echo $row2['programa_academico']?></td>
              <td><?php echo $row2['grupo']?></td>
              
             </tr>
             <?php } ?> 
          </tr>
		</table>
    </div>  
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
  </body>
  </div>
</html>