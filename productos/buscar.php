<?php session_start()?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<?php include('../includes/libreria.php'); ?>
<?php 
//if ($_SESSION['miSession']['permisos']==9){
		$a=verListadoProductos('edicion',$conexion);
/*}else{
		echo 'Access denied<br>';
	?>
	<html>
		<head>	
			<meta http-equiv="refresh", content="3; url=../principal.php">
		</head>
	</html>
    <?php 
    }*/
	?>
</body>
</html>