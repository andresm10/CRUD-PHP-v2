<?php 
	require ("../modelo/modelo.php");
	$objModelo = new Formulario();
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Editar</title>
<script type="text/javascript" src="../ajax/ajax.js"></script>
<script type="text/javascript">
	var nombre = "", apellido="", ciudad="", telefono="", descripcion="", imagen="", pais="", pk="", email="";	
	
	function modificarInformacion(){
		modelo = document.getElementById("modelo_editar").value;
		nombre = document.getElementById("nombre_editar").value;
		marca = document.getElementById("marca_editar").value;
		placa = document.getElementById("placa_editar").value;
		color = document.getElementById("color_editar").value;
		ciudad = document.getElementById("ciudad_editar").value;
		id = document.getElementById("id_editar").value;
		if(modelo!="" && nombre!="" && marca!="" && placa!="" && color!="" && ciudad!=""){
			ajax_("../control/controlador.php?modelo_editar="+modelo+"&nombre_editar="+nombre+"&marca_editar="+marca+"&placa_editar="+placa+"&color_editar="+color+"&ciudad_editar="+ciudad+"&id_editar="+id);
		}else{
			alert("Ingrese toda la informacion.");
		}		
	}
</script>
</head>

<body>
<form>
  <?php	
		if(isset($_GET["modelo"]) && isset($_GET["nombre"]) && isset($_GET["marca"]) && isset($_GET["placa"]) && isset($_GET["color"]) && isset($_GET["ciudad"])){
			$id=$_GET["id"];
			$modelo=$_GET["modelo"];
			$nombre=$_GET["nombre"];
			$marca=$_GET["marca"];
			$placa=$_GET["placa"];
			$color=$_GET["color"];
			$ciudad=$_GET["ciudad"];			
			}
	?>
  <br />
  <br />
  <table width="200" border="0" align="center">
    <input type="hidden" name="id_editar" id="id_editar" value="<?php echo $id; ?>" />
    <tr>
      <td>Nombres</td>
      <td><input type="text" name="modelo_editar" id="modelo_editar" value="<?php echo $modelo; ?>" /></td>
    </tr>
    <tr>
      <td>Apellidos</td>
      <td><input type="text" name="nombre_editar" id="nombre_editar" value="<?php echo $nombre; ?>" /></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><input type="text" name="marca_editar" id="marca_editar"  value="<?php echo $marca; ?>" /></td>
    </tr>
    <tr>
      <td>Tel&eacute;fono</td>
      <td><input type="text" name="placa_editar" id="placa_editar" value="<?php echo $placa; ?>" /></td>
    </tr>
    <tr>
      <td>Descripci&oacute;n</td>
      <td><input type="text" name="color_editar" id="color_editar" value="<?php echo $color; ?>" /></td>
    </tr>
    <tr>
      <td>Ciudad</td>
      <td><input type="text" name="ciudad_editar" id="ciudad_editar" value="<?php echo $ciudad; ?>" /></td>
    </tr>
    <tr>
      <td colspan="3" align="center"><input type="button" value="Modificar" onclick="modificarInformacion();" /></td>
    </tr>
  </table>
  <div id="resultado" align="center"></div>
</form>
<br />
<br />
<br />
</body>
</html>