<?php
include("conexion3.php");
$con = conectar();

$sql = "SELECT *  FROM asignar";
$query = mysqli_query($con, $sql);

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
    <link href="css/styles3.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Alumnos</h3>
                                </div>
                                <div class="card-body">
                                    <form method="post" action="">
                                        <table class="table" style="color:black" border="px">
                                            <thead style="color:black; text-align: center;">
                                                <tr>
                                                    <th>Materia</th>
                                                    <th>Profesor</th>
                                                    <th>Alumno</th>
                                                </tr>
                                            </thead>
                                            <tbody style="color:black;">
                                                <?php
                                                while ($row = mysqli_fetch_array($query)) {
                                                ?>
                                                    <tr>
                                                        <form method="post">
                                                            <th><input style="height: 100%; width:100%;" name="idmateria" value="<?php echo $row['idmateria'] ?>" readonly /></th>
                                                            <th><input style="height: 100%; width:100%;" name="numempleado" value="<?php echo $row['numempleado'] ?>" readonly /></th>
                                                            <th><input style="height: 100%; width:100%;" name="matricula" value="<?php echo $row['matricula'] ?>" readonly /></th>
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
                                <div style="margin-left: 15%; padding: 5%;" class="form-group mt-4 mb-0"><a href="doc1/pdf-reporte-general.php"><button class="btn btn-primary" style="width:400px;">Generar</button></a></div>
                                </form>
                            </div>
                            <div class="card-footer text-center">
                                <div class="small"><a style="color: black;" href="principal.php">Regresar al panel principal</a></div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </main>
    </div>
    <div id="layoutAuthentication_footer">
        <footer class="py-4 bg-light mt-auto">
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
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>

</html>