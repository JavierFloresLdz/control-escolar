<?php

session_start();
if (isset($_POST['logout'])) {
    # code...

    session_destroy();

    header("Location:index.html");
}


if (isset($_POST['registrar'])) {
    # code...

    $matricula = $_POST['matricula'];
    $_SESSION['matricula'] = $matricula;

    $nombre_alumno = $_POST['nombre_alumno'];
    $_SESSION['nombre_alumno'] = $nombre_alumno;

    $carrera = $_POST['carrera'];
    $_SESSION['carrera'] = $carrera;


    if (empty($matricula)) {

        # code...
        require_once 'conexion2.php';

        $sql = $cnnPDO->prepare("INSERT INTO alumnos
            (matricula, nombre_alumno, carrera) VALUES (:matricula, :nombre_alumno, :carrera)");

        //Asignar las variables a los campos de la tabla
        $sql->bindParam(':matricula', $matricula);
        $sql->bindParam(':nombre_alumno', $nombre_alumno);
        $sql->bindParam(':carrera', $carrera);

        //Ejecutar la variable $sql
        $sql->execute();
        unset($sql);
        unset($cnnPDO);

        header("Location:registrar-alumno.php");
        //header("Refresh: 3; URL=login.php");
    } else {
        # code...
        require_once 'conexion2.php';

        $sql = $cnnPDO->prepare("INSERT INTO alumnos
            (matricula, nombre_alumno, carrera) VALUES (:matricula, :nombre_alumno, :carrera)");

        //Asignar las variables a los campos de la tabla
        $sql->bindParam(':matricula', $matricula);
        $sql->bindParam(':nombre_alumno', $nombre_alumno);
        $sql->bindParam(':carrera', $carrera);

        //Ejecutar la variable $sql
        $sql->execute();
        unset($sql);
        unset($cnnPDO);

        header("Location:registrar-alumno.php");
        //header("Refresh: 3; URL=index.html");
    }
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
                                    <h3 class="text-center font-weight-light my-4">Registrar Alumno</h3>
                                </div>
                                <div class="card-body">
                                    <form action="" method="post">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group"><label class="small mb-1" for="matricula">Matrícula</label><input class="form-control py-4" id="matricula" name="matricula" type="text" placeholder="Matrícula" required /></div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group"><label class="small mb-1" for="carrera">Carrera</label><select style="height: 50px;" id="carrera" name="carrera" class="form-control" required>
                                                        <option value="" disabled selected>Selecciona una carrera</option>
                                                        <option value="Tecnologías de la Información">Tecnologías de la Información</option>
                                                        <option value="Procesos de Producción">Procesos de Producción</option>
                                                        <option value="Desarrollo de Negocios">Desarrollo de Negocios</option>
                                                        <option value="Biotecnología">Biotecnología</option>
                                                        <option value="Nanotecnología">Nanotecnología</option>
                                                        <option value="Mecatrónica">Mecatrónica</option>
                                                    </select></div>
                                            </div>
                                        </div>
                                        <div class="form-group"><label class="small mb-1" for="nombre_alumno">Nombre Completo</label><input class="form-control py-4" id="nombre_alumno" name="nombre_alumno" type="text" placeholder="Nombre Completo" required /></div>

                                        <div class="form-group mt-4 mb-0"><button type="submit" name="registrar" id="registrar" class="btn btn-primary">Registrar</button></div>
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