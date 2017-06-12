<?php session_start()?>
    <!-- PARA CARACTERES ESPECIALES -->
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 

<?php include '../includes/conexion.php';
$userIng=$_POST['user'];
$passIng=$_POST['pass'];
$consulta=mysqli_query($conexion,"select * from usuarios");
$puerta='continuar';
	while($filas = mysqli_fetch_array($consulta) and $puerta='continuar'){
		$id=$filas['id'];
		$nombre=$filas['nombre'];
		$usuario=$filas['usuario'];
		$pass=$filas['pass'];
		$permisos=$filas['permisos'];
		$fecha=$filas['fecha'];
		
		if (isset($userIng)and isset($passIng)){
			if ($usuario==$userIng and $pass==$passIng){
				echo 'Bienvenido '.$nombre;
				$miSession=array('id'=>$id,'nombre'=>$nombre,
				'usuario'=>$usuario,'pass'=>$pass,
				'fecha'=>$fecha,'permisos'=>$permisos);
				// ir a la página restringida
			$_SESSION['miSession']=$miSession;
			?>
			<html>
				<head>	
                	<meta http-equiv="refresh", content="1; url=../productos/buscar.php">
				</head>
			</html>
			<?php
				$puerta='salir';
				exit;
			} else{
				$resultado='no';
			}
		}
	}
	if ($resultado=='no'){
		echo 'Usuario o contraseña incorrecto';?>
		<html>
				<head>	
                	<meta http-equiv="refresh", content="1; url=pidodatos.php">
				</head>
			</html>
	<?php }?>
