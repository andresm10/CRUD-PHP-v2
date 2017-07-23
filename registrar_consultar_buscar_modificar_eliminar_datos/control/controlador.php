<?php 
	require("../modelo/modelo.php");
	$objFormulario = new Formulario();
	$mensajeExito="Registro Exitoso";
	$mensajeError="Error al Registrar: Datos Incompletos";	
	//---------------------------------------------------------------------------------------------------------------------------	
	if(isset($_GET["modelo_editar"]) && isset($_GET["nombre_editar"]) && isset($_GET["marca_editar"]) && isset($_GET["placa_editar"]) && isset($_GET["color_editar"]) && isset($_GET["ciudad_editar"]) && isset($_GET["id_editar"])){

			$objFormulario->modificarUsuario($_GET["modelo_editar"],$_GET["nombre_editar"],$_GET["marca_editar"],$_GET["placa_editar"],$_GET["color_editar"],$_GET["ciudad_editar"],$_GET["id_editar"]);			
	}
	//------------------------------------------ REGISTRAR--------------------------------------------------------------------------------	
	if(isset($_POST["modelo"]) && isset($_POST["nombre"]) && isset($_POST["marca"]) && isset($_POST["placa"]) && isset($_POST["color"]) && isset($_POST["ciudad"])){
			$objFormulario->registrar($_POST["modelo"],$_POST["nombre"],$_POST["marca"],$_POST["placa"],$_POST["color"],$_POST["ciudad"]);
			
		}	
	//-------------------------ELIMINAR USUARIO-------------------------	
	if(isset($_GET["eliminar"])){
		?>
			<script>
            	confirmar=confirm("¿Esta seguro de elimiar el registro?");
				if(confirmar){
					location.href="controlador.php?confirmacion=si&codigo_user=<?php echo $_GET["codigo"]; ?>";
				}else{
					location.href="../vista/modificarInformacion.php";
				}
           </script>
		<?php
	}
	if(isset($_GET["confirmacion"])){
		$objFormulario->eliminar($_GET["codigo_user"]);
	}	
?>