<?php

require "conexion.php";

session_start();

if ($_POST) {

	$usuario = $_POST['usuario'];
	$password = $_POST['password'];

	$sql = "SELECT id, password, nombre, tipo_usuario FROM usuarios WHERE usuario='$usuario' AND 	
    password='$password'";
	//echo $sql;
	$resultado = $mysqli->query($sql);
	$num = $resultado->num_rows;

	if ($num > 0) {
		$row = $resultado->fetch_assoc();



		$_SESSION['id'] = $row['id'];
		$_SESSION['nombre'] = $row['nombre'];
		$_SESSION['tipo_usuario'] = $row['tipo_usuario'];

		header("Location: principal.php");
	} else {

		echo "Los datos que ingresaste no son correctos";
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
						<div class="col-lg-5">
							<div class="card shadow-lg border-0 rounded-lg mt-5">
								<div class="card-header">
									<h3 class="text-center font-weight-light my-4">Inicio de sesión</h3>
								</div>
								<div class="card-body">
									<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
										<div class="form-group"><label class="small mb-1" for="inputEmailAddress">Usuario</label><input class="form-control py-4" id="inputEmailAddress" name="usuario" type="text" placeholder="Ingresa un usuario" /></div>
										<div class="form-group"><label class="small mb-1" for="inputPassword">Contraseña</label><input class="form-control py-4" id="inputPassword" name="password" type="password" placeholder="Ingresa una contraseña" /></div>
										<div class="form-group">
											<div class="custom-control custom-checkbox"><input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" /><label class="custom-control-label" for="rememberPasswordCheck">Recordar contraseña</label></div>
										</div>
										<div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0"><a class="small" href="password.html">¿Olvidaste tu contraseña?</a>
											<button type="submit" class="btn btn-primary">Ingresar</button>
										</div>
									</form>
								</div>
								<div class="card-footer text-center">
									<div class="small"><a href="register.html">¿No tienes una cuenta? ¡Registrate ahora!</a></div>
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