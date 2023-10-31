<?php
$server="127.0.0.1";
$user="root";
$password="";
$db="prueba";

$conn=new mysqli($server,$user,$password,$db);
if($conn ->connect_error){
    echo '<script type="text/javascript">
    alert("Conexion denegada");
    window.location.href="../Index.html";
    </script>';
    
}
?>