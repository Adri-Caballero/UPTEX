 <?php
include "conexion.php";
$numeroadquisitivo = $_POST["numero"];

 $busqueda = mysqli_query($conn, "SELECT * FROM libros WHERE num_adqui = '$numeroadquisitivo'");
    

?>
<!DOCTYPE html>
<html>
  <head>
    <div class="container" style="box-shadow: 0px 0px 50px rgba(15, 14, 14, 0.856);">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Libros</title>
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
    <div class="container">
    <nav class="navbar navbar-light" style="background-color: #ffffffc0">
      <div class="container-fluid">
        <a class="navbar-brand" href="../html/inicio.html"><img src="../imagenes/h1.png" width="250px" height="70" /> <b> Universidad
          Politecnica de Texcoco</b></a
        >
      </div>
    </nav>
    <nav class="navbar navbar-light" style="background-color: #e3f2fd00">
      <ul class="nav nav-pills">
        <ul class="nav nav-pills">
          <li class="nav-item">
            <a class="nav-link"  aria-current="page" href="../html/inicio.html">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../html/prestamo.html">Prestamo</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../php/adeudos.php">Alumnos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" style="background-color: rgba(110, 112, 111, 0.377);" href="../php/libros.php">Libros</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="../php/librosvencidos.php">Adeudos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../php/librosentregados.php">Devoluciones</a>
        </li>
        </ul>
        
        <li>
          <form class="form-inline" action="../php/buscarlibros.php" method="post">
            <input class="form-control mr-sm-2" type="search" name="numero" placeholder="Ingrese numero adquisitivo" aria-label="Search" required>
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
              Buscar
            </button>
          </form>
          <form action="../html/agregarlibros.html" method="post">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
              Agregar
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
              Numero <br>
              adquisitivo
            </th>
            <th scope="col">
              Nombre del <br />
              libro
            </th>
            <th scope="col">
                Autor
              </th>
              <th scope="col">
                Ejemplares
            </th>
          </tr>
        </thead>
        <?php $busqueda2 = mysqli_query($conn, "SELECT * FROM libros WHERE num_adqui = '$numeroadquisitivo'"); ?> 
        
        <tbody>
          <tr>
        <?php if ($row = mysqli_fetch_array($busqueda2)){?>
            <td><?php echo $row['num_adqui']; ?></td>
            <td><?php echo $row['titulolibro']; ?></td>
            <td><?php echo $row['autor']; ?></td>
            <td><?php echo $row['ejemplar'];?></td>
          </tr>
        <?php }else{?>
      <html>
      <body>
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script src="js/sweetalert.js"></script>
      <script>
        Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Libro no encontrado'
        })
      </script>
      </body>
   </html> 
      <?php }?>
        </tbody>
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
    </div>
    
  </body>
</html>