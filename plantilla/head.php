<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>

<div class="cabecera"><a href="<?php echo url_base('galeria.php') ?>">Inicio</a> │ Nosotros │ Contacto │ <a href="<?php echo url_base('usuarios/pidodatos.php') ?>">Login</a>
	<?php if ($imgCabecera=="iconos/ver_carrito.png"){?>
    	<div class="carrito"><a href="<?php echo url_base('carrito/carrito.php') ?>"><img src=<?php echo $imgCabecera ?> /></a></div>
    <?php }else{?>
        <div class="carrito"> <img src=<?php echo $imgCabecera ?> /></div>
    <?php }?>
</div>
</head>

<body>
</body>
</html>