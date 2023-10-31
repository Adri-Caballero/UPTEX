<?php
    include "conexion.php";
    $matricula = $_POST['matricula'];
    $busqueda = mysqli_query($conn, "SELECT * FROM prestamos WHERE matricula = '$matricula'");
?>
<html>
    <table>
        <td><?php echo $row['matricula'];?></td>
        <td><?php echo $row['nombre'];?></td>
        <td><?php echo $row['fechaprestamo'];?></td>
        <td><?php echo $row['fechaentrega'];?></td>
        <td><?php echo $row['foliolibro'];?></td>
        <td><?php echo $row['nombrelibro'];?></td> 
    </html>
</html>