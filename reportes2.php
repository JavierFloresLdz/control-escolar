<?php
session_start();

if (isset($_POST['logout'])) {
    # code...

    session_destroy();

    header("Location:index.php");
}

require 'conexion.php';
require 'conexion2.php';

if (!isset($_SESSION['id'])) {
    header("Location: index.php");
}
$nombre = $_SESSION['nombre'];
$id = $_SESSION['id'];
$tipo_usuario = $_SESSION['tipo_usuario'];

if ($tipo_usuario == 1) {
    $where = "";
} else if ($tipo_usuario == 2) {
    $where = "WHERE id=$id";
}

$sql = "SELECT * FROM alumnos $where";
$resultado = $mysqli->query($sql);



?>

<?php
include("conexion.php");
include("conexion3.php");
$con = conectar();

$sql = "SELECT *  FROM alumnos";
$query = mysqli_query($con, $sql);

$sql2 = "SELECT *  FROM profesores";
$query2 = mysqli_query($con, $sql2);

$sql3 = "SELECT *  FROM materias";
$query3 = mysqli_query($con, $sql3);
?>


<!-- ACTUALIZAR -->
<?php
require_once 'conexion.php';
require_once 'conexion2.php';
require_once 'conexion3.php';
//Valida que el usuario hizo clik en el Boton 
if (isset($_POST['actualizaralumno'])) {
    //Trae datos del formulario
    $matricula = $_POST['matricula'];
    $nombre_alumno = $_POST['nombre_alumno'];
    $carrera = $_POST['carrera'];

    //Validar que las cajas no esten vacias
    {
        //Actualizamos los datos en la tabla de la db  
        $sql = $cnnPDO->prepare(
            'UPDATE alumnos SET matricula = :matricula, nombre_alumno = :nombre_alumno, carrera = :carrera WHERE matricula = :matricula'
        );

        //Asignar las variables a los campos de la tabla
        $sql->bindParam(':matricula', $matricula);
        $sql->bindParam(':nombre_alumno', $nombre_alumno);
        $sql->bindParam(':carrera', $carrera);

        //Ejecutar la variable $sql
        $sql->execute();
        unset($sql);
        unset($cnnPDO);
    }
    header("location:reportes2.php");
    //print "<script>window.location='reporte2.php';</script>";
}
?>

<!-- Códigos de ELIMINAR -->
<?php
require_once 'conexion.php';
require_once 'conexion2.php';
require_once 'conexion3.php';
//se verifica si se presiona el botón llamado validar
if (isset($_POST['eliminaralumno'])) {
    //se guarda en las variables$us y $ps
    $matricula = $_POST['matricula'];

    //Query de consulta
    $query = $cnnPDO->prepare('DELETE from alumnos WHERE matricula =:matricula');

    //Manejo de parámetros
    $query->bindParam(':matricula', $matricula);

    //Execución del query
    $query->execute();

    //header("location:index.html"); 
    header("location:reportes2.php");
}
?>


<!-- ACTUALIZAR -->
<?php
require_once 'conexion.php';
require_once 'conexion2.php';
require_once 'conexion3.php';
//Valida que el usuario hizo clik en el Boton 
if (isset($_POST['actualizarprofesor'])) {
    //Trae datos del formulario
    $numempleado = $_POST['numempleado'];
    $nombre_profesor = $_POST['nombre_profesor'];

    //Validar que las cajas no esten vacias
    {
        //Actualizamos los datos en la tabla de la db  
        $sql = $cnnPDO->prepare(
            'UPDATE profesores SET numempleado = :numempleado, nombre_profesor = :nombre_profesor WHERE numempleado = :numempleado'
        );

        //Asignar las variables a los campos de la tabla
        $sql->bindParam(':numempleado', $numempleado);
        $sql->bindParam(':nombre_profesor', $nombre_profesor);

        //Ejecutar la variable $sql
        $sql->execute();
        unset($sql);
        unset($cnnPDO);
    }
    header("location:reportes2.php");
    //print "<script>window.location='reporte2.php';</script>";
}
?>

<!-- Códigos de ELIMINAR -->
<?php
require_once 'conexion.php';
require_once 'conexion2.php';
require_once 'conexion3.php';
//se verifica si se presiona el botón llamado validar
if (isset($_POST['eliminarprofesor'])) {
    //se guarda en las variables$us y $ps
    $numempleado = $_POST['numempleado'];

    //Query de consulta
    $query = $cnnPDO->prepare('DELETE from profesores WHERE numempleado =:numempleado');

    //Manejo de parámetros
    $query->bindParam(':numempleado', $numempleado);

    //Execución del query
    $query->execute();

    //header("location:index.html"); 
    header("location:reportes2.php");
}
?>



<!-- ACTUALIZAR -->
<?php
require_once 'conexion.php';
require_once 'conexion2.php';
require_once 'conexion3.php';
//Valida que el usuario hizo clik en el Boton 
if (isset($_POST['actualizarmateria'])) {
    //Trae datos del formulario
    $idmateria = $_POST['idmateria'];
    $nombre_materia = $_POST['nombre_materia'];

    //Validar que las cajas no esten vacias
    {
        //Actualizamos los datos en la tabla de la db  
        $sql = $cnnPDO->prepare(
            'UPDATE materias SET idmateria = :idmateria, nombre_materia = :nombre_materia WHERE idmateria = :idmateria'
        );

        //Asignar las variables a los campos de la tabla
        $sql->bindParam(':idmateria', $idmateria);
        $sql->bindParam(':nombre_materia', $nombre_materia);

        //Ejecutar la variable $sql
        $sql->execute();
        unset($sql);
        unset($cnnPDO);
    }
    header("location:reportes2.php");
    //print "<script>window.location='reporte2.php';</script>";
}
?>

<!-- Códigos de ELIMINAR -->
<?php
require_once 'conexion.php';
require_once 'conexion2.php';
require_once 'conexion3.php';
//se verifica si se presiona el botón llamado validar
if (isset($_POST['eliminarmateria'])) {
    //se guarda en las variables$us y $ps
    $idmateria = $_POST['idmateria'];

    //Query de consulta
    $query = $cnnPDO->prepare('DELETE from materias WHERE idmateria =:idmateria');

    //Manejo de parámetros
    $query->bindParam(':idmateria', $idmateria);

    //Execución del query
    $query->execute();

    //header("location:index.html"); 
    header("location:reportes2.php");
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Sistema Web de Control Escolar</title>
    <link rel="icon" href="assets/img/logoescolar.png" type="image/png" />
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="principal.php">Control Escolar</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button><!-- Navbar Search-->
        <!--<form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
				<input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
				<div class="input-group-append">
				<button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
				</div>
                </div>
			</form>-->
        <!-- Navbar-->
        <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $nombre; ?><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">

                    <a class="dropdown-item" href="logout.php">Salir</a>
                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="principal.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Menú Principal
                        </a>

                        <?php if ($tipo_usuario == 1) { ?>

                            <div class="sb-sidenav-menu-heading">Registros</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Nuevo Registro
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="registrar-profesor.php">Nuevo Profesor</a><a class="nav-link" href="registrar-alumno.php">Nuevo Alumno</a></nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Materias
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="registrar-materia.php">Nueva Materia
                                        <div class="sb-sidenav-collapse-arrow"></div>
                                    </a>

                                </nav>
                            </div>

                        <?php } ?>

                        <div class="sb-sidenav-menu-heading">Generar</div>
                        <a class="nav-link" href="doc1/pdf-reporte-alumnos.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Reporte de alumnos
                        </a>
                        <a class="nav-link" href="doc1/pdf-reporte-profesores.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Reporte de profesores
                        </a>
                        <a class="nav-link" href="doc1/pdf-reporte-materias.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Reporte de materias
                        </a>
                    </div>
                </div>
            </nav>
        </div>

        <section>
            <center>
                <div style="margin-left: 230px;" class="container mt-5">
                    <div class="row">
                        <h1>Alumnos</h1>
                    </div>
                    <table class="table" style="color:black" border="px">
                        <thead class="table-success table-striped">
                            <tr>
                                <th style="width:10%;">Matricula</th>
                                <th>Nombre completo</th>
                                <th>Carrera</th>
                                <th style="width:10%;"></th>
                                <th style="width:10%;"></th>
                            </tr>
                        </thead>

                        <tbody style="color:black;">
                            <?php
                            while ($row = mysqli_fetch_array($query)) {
                            ?>
                                <tr>
                                    <form method="post">
                                        <th><input style="height: 100%; width:100%;" name="matricula" value="<?php echo $row['matricula'] ?>" readonly /></th>
                                        <th><input style="height: 100%; width:100%;" name="nombre_alumno" placeholder="<?php echo $row['nombre_alumno'] ?>" value="<?php if (isset($_POST['buscar'])) echo $row['nombre_alumno']  ?>" /></th>
                                        <th><input style="height: 100%; width:100%;" name="carrera" placeholder="<?php echo $row['carrera'] ?>" value="<?php if (isset($_POST['buscar'])) echo $row['carrera']  ?>" /></th>
                                        <th><button type="submit" name="actualizaralumno" <?php echo $row['matricula'] ?> class="btn btn-info" style="height:100%; width:100%;">Actualizar</button></th>
                                        <th><button type="submit" name="eliminaralumno" <?php echo $row['matricula'] ?> class="btn btn-danger" style="height:100%; width:100%;">Eliminar</button></th>
                                </tr>
                                </form>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                </tbody>
                </table>
    </div>
    </div>
    </div>
    </section>
    <!-- end header -->
    </div>
    </div>
    </center>

    <section>
        <center>
            <div style="margin-left: 230px;" class="container mt-5">
                <div class="row">
                    <h1>Maestros</h1>
                </div>
                <table class="table" style="color:black" border="px">
                    <thead class="table-success table-striped">
                        <tr>
                            <th style="width:20%;">Número de empleado</th>
                            <th>Nombre completo</th>
                            <th style="width:10%;"></th>
                            <th style="width:10%;"></th>
                        </tr>
                    </thead>

                    <tbody style="color:black;">
                        <?php
                        while ($row = mysqli_fetch_array($query2)) {
                        ?>
                            <tr>
                                <form method="post">
                                    <th><input style="height: 100%; width:100%;" name="numempleado" value="<?php echo $row['numempleado'] ?>" readonly /></th>
                                    <th><input style="height: 100%; width:100%;" name="nombre_profesor" placeholder="<?php echo $row['nombre_profesor'] ?>" value="<?php if (isset($_POST['buscar'])) echo $row['nombre_profesor']  ?>" /></th>
                                    <th><button type="submit" name="actualizarprofesor" <?php echo $row['numempleado'] ?> class="btn btn-info" style="height:100%; width:100%;">Actualizar</button></th>
                                    <th><button type="submit" name="eliminarprofesor" <?php echo $row['numempleado'] ?> class="btn btn-danger" style="height:100%; width:100%;">Eliminar</button></th>
                            </tr>
                            </form>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            </tbody>
            </table>
            </div>
            </div>
            </div>
    </section>
    <!-- end header -->
    </div>
    </div>
    </center>

    <center>
        <div style="margin-left: 230px;" class="container mt-5">
            <div class="row">
                <h1>Materias</h1>
            </div>
            <table class="table" style="color:black" border="px">
                <thead class="table-success table-striped">
                    <tr>
                        <th style="width:20%;">Id de la materia</th>
                        <th>Nombre</th>
                        <th style="width:10%;"></th>
                        <th style="width:10%;"></th>
                    </tr>
                </thead>

                <tbody style="color:black;">
                    <?php
                    while ($row = mysqli_fetch_array($query3)) {
                    ?>
                        <tr>
                            <form method="post">
                                <th><input style="height: 100%; width:100%;" name="idmateria" value="<?php echo $row['idmateria'] ?>" readonly /></th>
                                <th><input style="height: 100%; width:100%;" name="nombre_materia" placeholder="<?php echo $row['nombre_materia'] ?>" value="<?php if (isset($_POST['buscar'])) echo $row['nombre_materia']  ?>" /></th>
                                <th><button type="submit" name="actualizarmateria" <?php echo $row['idmateria'] ?> class="btn btn-info" style="height:100%; width:100%;">Actualizar</button></th>
                                <th><button type="submit" name="eliminarmateria" <?php echo $row['idmateria'] ?> class="btn btn-danger" style="height:100%; width:100%;">Eliminar</button></th>
                        </tr>
                        </form>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        </tbody>
        </table>
        </div>
        </div>
        </div>
        </section>
        <!-- end header -->
        </div>
        </div>
    </center>








    <footer style="margin-left: 280px;" class="py-4 bg-light mt-auto">
        <div class="container-fluid">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; Desarrollado por: Francisco Javier Flores Ledezma | 5TIDSMA | 2022</div>
                <div>
                    <a href="#">Política de Privacidad</a>
                    &middot;
                    <a href="#">Términos &amp; Condiciones</a>
                </div>
            </div>
        </div>
    </footer>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>
</body>

</html>