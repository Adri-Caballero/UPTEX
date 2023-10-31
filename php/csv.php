<?php

    if (isset($_POST["cargar"])) {
        header('Content-Type: text/html; charset=UTF-8');
        require_once('conexion.php');

        $archivo = $_FILES["archivo"]["name"];
        $archivocopia = $_FILES["archivo"]["tmp_name"];
        //$archivoguardado = "copia_".$archivo;

        if (file_exists($archivocopia)) {
            $fp = fopen($archivocopia,"r");
            while ($datos = fgetcsv($fp,1000,",")) {
                $sql = "INSERT INTO alumnos
                (matricula,nombre,apellido_paterno,apellido_materno,grado,statu,programa_academico,grupo)
                SELECT '$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]','$datos[6]','$datos[7]'
                WHERE NOT EXISTS(SELECT 1 FROM alumnos WHERE matricula = '$datos[0]')";
                
                $sql1 =  "UPDATE alumnos SET statu= '$datos[5]' WHERE matricula='$datos[0]'";                
                $insertar = mysqli_query($conn,$sql);
                $actualizar = mysqli_query($conn,$sql1);
                
                if($insertar){
                  if($actualizar){
                      
                  }
                  
                
                }
            }
        }else{?>
        <html>
        <body>
        <script src="js/sweetalert.js"></script>
            <script>
                Swal.fire({
                icon: 'error',
                title: 'Opss...',
                text: 'La base de datos no se actualizo',
            })
            </script>
        </body>
    </html>
    <?php
        }    
    }
    
?>
<html>
                    <body>
                        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                        <script src="js/sweetalert.js"></script>
                        <script>
                            Swal.fire({
                                icon: 'success',
                                title: 'Exito...',
                                text: 'La base de datos se actualizo',
                            })
                        </script>
                    </body>
                </html>

                <!DOCTYPE html>
<html>

<head>
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title>Cargar CSV</title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
  <script src='main.js'></script>
  <!--Estilos de la ventana Cargar archivo csv-->
  <link rel="stylesheet" href="../css/stylescsv.css ">
  <!--Estilos del Encabezado-->
  <link rel="stylesheet" href="../css/styles.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="shortcut icon" href="../Iconos/favicon.jpg" type="image/x-icon">
  <!-------------------------------------------------->
</head>

<body>
  <!--Codigo de encabezado-->
  <div class="container" style="box-shadow: 0px 0px 50px rgba(15, 14, 14, 0.856);">
    <nav class="navbar navbar-light" style="background-color: #0f0f0f3b;">
      <div class="container-fluid">
        <a class="navbar-brand" href="../html/inicio.html"><img src="../imagenes/h1.png" width="250px" height="70"> <b>
            Universidad Politecnica de Texcoco </b></a>
      </div>
      <hr class="linea">
    </nav>
    <div>
      <nav class="navbar navbar-light" style="background-color: #a5979725;">
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
          <a class="nav-link" href="../php/librosvencidos.php">Adeudos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../php/librosentregados.php">Devoluciones</a>
        </li>
          <li class="nav-item">
            <a class="nav-link active" style="background-color: rgba(110, 112, 111, 0.377);" href="../html/csv.html">Importar CSV</a>
          </li>
        </ul>
      </nav>
    </div>
    <!--Termina codifo de Encabezado-->
    <div class="center" style="box-shadow: 1px 6px 20px rgba(5, 5, 5, 0.856);">
      <h1>BASE DE DATOS</h1>
      <br>
      <center> Favor de cargar el archivo en formato csv</center>
      <form action="../php/csv.php" method="post" enctype="multipart/form-data">
        <br>
        <center><input class="documento" type="file" name="archivo" required> </center>
        <br>
        <div class="centrar">
          <input class="holaa" type="submit" name="cargar" value="Cargar">
        </div>
      </form>
      <br>
    </div>
    <div style="background-color:#0f0f0f3b;">
      <footer class="py-4" style="margin-top: 40%;">
        <div class="container">
          <p class="m-0 text-center text-black">
            &copy; Sistema de biblioteca elaborado por: Angeles Antonio Misael, Cordova caballero Carlos Adrian, Cruz
            Lopez
            Susana || TESCHI
          </p>
        </div>
      </footer>
    </div>

  </div>

</body>

</html>