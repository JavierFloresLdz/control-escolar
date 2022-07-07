<?php

session_start();

include "con2.php";
?>

<?php

if (isset($_POST['registrar'])) {

    $numempleado = $_POST['numempleado'];
    $idmateria = $_POST['idmateria'];
    $matricula = $_POST['matricula'];

    $asig = "INSERT INTO asignar SET numempleado='$numempleado',  idmateria='$idmateria', matricula='$matricula' ";
    $ejecutar_insertar_asig = mysqli_query($link, $asig);
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
                                    <h3 class="text-center font-weight-light my-4">Asignar</h3>
                                </div>
                                <div class="card-body">
                                    <form method="post" action="">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <select name="numempleado" class="form-control border-0" required>
                                                    <option value="">Profesores</option>
                                                    <?php
                                                    $maes = mysqli_query($link, "SELECT*FROM profesores");
                                                    while ($maestros = mysqli_fetch_row($maes)) {
                                                    ?>
                                                        <option value="<?php echo $maestros[0] ?>"><?php echo $maestros[1] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <select name="idmateria" class="form-control border-0" required>
                                                    <option value="">Materias</option>
                                                    <?php
                                                    $mat = mysqli_query($link, "SELECT*FROM materias");
                                                    while ($materias = mysqli_fetch_row($mat)) {
                                                    ?>
                                                        <option value="<?php echo $materias[0] ?>"><?php echo $materias[1] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <select name="matricula" class="form-control border-0" required>
                                                    <option value="">Alumnos</option>
                                                    <?php
                                                    $alum = mysqli_query($link, "SELECT*FROM alumnos");
                                                    while ($alumnos = mysqli_fetch_row($alum)) {
                                                    ?>
                                                        <option value="<?php echo $alumnos[0] ?>"><?php echo $alumnos[1] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <br>
                                            <div class="form-group mt-4 mb-0"><button type="submit" name="registrar" class="btn btn-primary">Registrar</button></div>
                                    </form>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="small"><a href="principal.php">Regresar al panel principal</a></div>
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