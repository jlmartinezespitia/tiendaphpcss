<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<?php
	$id=$_POST['id2'];
  	$imagen=$_POST['imagen2'];
	$nombre=$_POST['nombre2'];
	$desc=$_POST['desc2'];
  	$precio=$_POST['precio2'];
  	$cantidad=$_POST['cantidad2'];
	$fecha=$_POST['fecha2'];
	?>
<form action="recibirEditar.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="335" border="0">
    <tr>
      <td width="82">Imagen nueva:</td>
      <td width="243"><label for="imagen2"></label>
      <input id="examinar" type="file" name="imagen2" id="imagen2" /></td>
    </tr>
    <tr>
      <td>Imagen:</td>
      <td><label for="imagen"></label> 
      <img id="imagenActual" src="<?php echo $imagen ?>" width="180" height="100" /></td>
    </tr>
    <tr>
      <td>Nombre:</td>
      <td><label for="nombre"></label>
      <input name="nombre" type="text" id="nombre" value="<?php echo $nombre ?>"/></td>
    </tr>
    <tr>
      <td>Descripción;</td>
      <td><label for="desc"></label>
      <input type="text" name="desc" id="desc"  value="<?php echo $desc ?>"/></td>
    </tr>
    <tr>
      <td>Stock:</td>
      <td><label for="stock"></label>
      <input type="text" name="stock" id="stock" value="<?php echo $cantidad ?>" /></td>
    </tr>
    <tr>
      <td>Precio:</td>
      <td><label for="precio"></label>
      <input type="text" name="precio" id="precio"  value="<?php echo $precio ?>"/></td>
    </tr>
    <tr>
      <td>Fecha:</td>
      <td><label for="fecha"></label>
      <input type="text" name="fecha" id="fecha"  value="<?php echo $fecha ?>"/></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="hidden" name="id" id="hiddenField"value="<?php echo $id ?>" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="modificar" id="modificar" value="Modificar" />
      <input type="button" name="cancelar" id="cancelar" value="Cancelar" onclick="location='buscar.php'"/ /></td>
    </tr>
  </table>
</form>
<html>
      <head>
            <style>
          .thumb {
            height: 300px;
            border: 1px solid #000;
            margin: 10px 5px 0 0;
          }
        </style>
    </head>
    <body>
      <input type="file" id="files" name="files[]" />
        <br />
        <output id="list"></output>
         
        <script>
              function archivo(evt) {
                  var files = evt.target.files; // FileList object
             
                  // Obtenemos la imagen del campo "file".
                  for (var i = 0, f; f = files[i]; i++) {
                    //Solo admitimos imágenes.
                    if (!f.type.match('image.*')) {
                        continue;
                    }
             
                    var reader = new FileReader();
             
                    reader.onload = (function(theFile) {
                        return function(e) {
                          // Insertamos la imagen
                         document.getElementById("list").innerHTML = ['<img class="thumb" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
                        };
                    })(f);
             
                    reader.readAsDataURL(f);
                  }
              }
             
              document.getElementById('files').addEventListener('change', archivo, false);
      </script>
    </body>
</html>
</body>
</html>