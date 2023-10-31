<?php
include "conexion.php";

$numero=$_POST["numero"];
$titulo=$_POST["titulo"];
$autor=$_POST["autor"];
$editorial=$_POST["editorial"];
$ejemplares=$_POST["ejemplares"];
$tema=$_POST["tema"];

//$busqueda = mysqli_query($conn, "SELECT * FROM alumnos WHERE matricula = '$matricula'");
  $insertar = mysqli_query($conn,"SELECT * FROM libros where num_adqui = '$numero'");
  $sql = "INSERT INTO libros(num_adqui,titulolibro,autor,editorial,ejemplar,tema) VALUES 
      ('$numero','$titulo','$autor','$editorial'
      ,'$ejemplares','$tema')";
  //If que busca el numero del libro
if($consulta = mysqli_fetch_array($insertar)){
    ?>
<!DOCTYPE html>
<html>
    <!--estilo de la alerta cuando realiza el prestamo-->
    
    <body>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            swal.fire({
            icon: 'error',
            title: 'Upss...',
            text: 'El numero adquisitivo esta duplicado'
            });
        </script>
        
    </body>
</html>
<?php
  //si no encuentra el numero de libro
}else{

    mysqli_query($conn,$sql);
  ?>
<html>
  
    <!--Estilo de alerta su no encuentra al alumno-->
    <body>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
            icon: 'success',
            title: 'Listo...',
            text: 'Libro agregado',
            footer: '<a href="../html/agregarlibros.html">Agregar libro nuevo</a>'
            })
        </script>
    </body>
</html>
<?php
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title>Agregar libros</title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel="stylesheet" href="../css/styles.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="shortcut icon" href="../Iconos/favicon.jpg" type="image/x-icon">
</head>

<body>
  <div class="container" style="box-shadow: 0px 0px 50px rgba(15, 14, 14, 0.856);">
    <nav class="navbar navbar-light" style="background-color: #0f0f0f3b;">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.html"><img src="../imagenes/h1.png" width="250px" height="70"> <b>
            Universidad Politecnica de Texcoco </b></a>
      </div>
      <hr class="linea">
    </nav>
    
    <hr color="black">
    <nav>
      <form class="formu" action="../php/agregarlibro.php" method="post">
        <input class="entrada" type="text" name="numero" placeholder="Ingresa numero adquisitivo del libro" required><br><br>
        <input class="entrada" type="text" name="titulo" placeholder="Ingresa titulo del libro" required> <br><br>
        <input class="entrada" type="text" name="autor" placeholder="Ingresa autor del libro" required><br><br>
        <input class="entrada" type="text" name="editorial" placeholder="Ingresa editorial del libro" required><br><br>
        <input class="entrada" type="number" name="ejemplares" placeholder="Ingresa numero de ejemplares del libro" required><br><br>
        <input class="entrada" type="text" name="tema" placeholder="Ingresa tema del libro" required><br><br>
        
        <center><button class="btn btn-outline-success my-2 my-sm-0" type="submit">Añadir</button>
        </center>
      </form>
      <br>
      <center><a href="../php/libros.php" class="btn btn-outline-success my-2 my-sm-0" >Regresar</a>
      </center>
      
    </nav>
    <br><br><br><br>
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