<?php

include("conexion4.php");

$con = conectar();

$numempleado = $_POST['numempleado'];
$nombre_profesor = $_POST['nombre_profesor'];


$sql = "UPDATE profesors SET  nombre_profesor='$nombre_profesor' WHERE numempleado='$numempleado'";
$query = mysqli_query($con, $sql);

if ($query) {
    Header("Location: reportes2.php");
}
