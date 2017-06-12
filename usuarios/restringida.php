<?php session_start()?>
<?php 
	if ($_SESSION['miSession']['permisos']==9){
    	echo 'Tiene permiso<br>'; /* ESTO EN TODAS LAS PÁGINAS */
		echo $_SESSION['miSession']['nombre'].'<br>';
		echo $_SESSION['miSession']['usuario'].'<br>';
		echo $_SESSION['miSession']['permisos'].'<br>';/*  */
	}else{
		echo 'Access denied<br>';
	?>
	<html>
		<head>	
			<meta http-equiv="refresh", content="3; url=pidodatos.php">
		</head>
	</html>
    <?php 
    }
	?>
	
    