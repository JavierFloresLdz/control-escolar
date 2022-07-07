<?php

include("conexion4.php");

$con = conectar();

$matricula = $_POST['matricula'];
$nombre_alumno = $_POST['nombre_alumno'];
$carrera = $_POST['carrera'];


$sql = "UPDATE alumnos SET  nombre_alumno='$nombre_alumno',carrera='$carrera' WHERE matricula='$matricula'";
$query = mysqli_query($con, $sql);

if ($query) {
    Header("Location: reportes2.php");
}
