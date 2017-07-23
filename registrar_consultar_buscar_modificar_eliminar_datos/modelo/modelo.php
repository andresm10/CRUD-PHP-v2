<link href="../css/estilos_tabla.css" rel="stylesheet" type="text/css" />
<?php
	require "../conexion/conexion.php";
	class Formulario{
		var $conn;
		var $conexion;
		var $mensajeExito;
		var $mensajeError;
		function Formulario(){
			$this->conexion= new  Conexion();				
			$this->conn=$this->conexion->conectarse();
			$this->mensajeExito="Registro Exitoso";
			$this->mensajeError="Error al Registrar";
		}
		//---------------------------------------------------------------------------------------------------------------------------		
		function registrar($modelo, $nombre, $marca, $placa, $color, $ciudad){
			
			$queryRegistrar = "insert into vehiculos (modelo, nombre, marca, placa, color, ciudad) 
			values ('".$modelo."', '".$nombre."', '".$marca."', '".$placa."', '".$color."', '".$ciudad."')";
			$registrar = mysqli_query($this->conn, $queryRegistrar) or die(mysqli_error());			
			
			if($registrar){
				echo "<script>location.href='../vista/index.php?mensaje=". $this->mensajeExito."';</script>";				
			}else{
				echo "<script>location.href='../vista/index.php?mensaje=".$this->mensajeError."';</script>";
			}
		}		
		//---------------------------------------------------------------------------------------------------------------------------
		function listar(){
			$sql="select * from vehiculos";
			$rs=mysqli_query($this->conn, $sql);
			$i=0;
			if(mysqli_num_rows($rs)<1){
				echo "No hay vehiculos registrados";	
			}else{
			 echo "<table border='0' align='center' class='table_' >";
			 echo "<thead>
					<th>Modelo</th>
					<th>Nombre</th>
					<th>Marca</th>
					<th>Placa</th>
					<th>Color</th>
					<th>Ciudad</th>
					<th>Modificar</th>
					<th>Eliminar</th>
				</thead>";
			 while ($row = mysqli_fetch_array($rs)){	 								
			echo "<td align='center'>".$row["modelo"]."</td>";
			echo "<td align='center'>".$row["nombre"]."</td>";	
			echo "<td align='center'>".$row["marca"]."</td>";
			echo "<td align='center'>".$row["placa"]."</td>";			
			echo "<td align='center'>".$row["color"]."</td>";			
			echo "<td align='center'>".$row["ciudad"]."</td>";
						
			echo '<td align="center">
			<a class="fancybox fancybox.iframe" href="../vista/fancyBoxModificar.php?id='.$row["id"].'&modelo='.$row["modelo"].'&nombre='.$row["nombre"].'&marca='.$row["marca"].'&placa='.$row["placa"].'&color='.$row["color"].'&ciudad='.$row["ciudad"].'" >Editar</a></td>';
			echo "<td><a href='../control/controlador.php?eliminar=si&codigo=".$row["id"]."'>Eliminar</a></td></tr>";
			$i++; 
			}			
			}
			echo "</table>";
		}
		//---------------------------------------------------------------------------------------------------------------------------
		function modificarUsuario($modelo, $nombre, $marca, $placa, $color, $ciudad, $id){
			$queryUpdate = "update vehiculos set modelo = '".$modelo."', nombre = '".$nombre."', marca = '".$marca."', placa = '".$placa."', color = '".$color."', ciudad = '".$ciudad."' where id = ".$id;
			$update =mysqli_query($this->conn, $queryUpdate);
			if($update){
				echo "Actualizacion Exitosa";
			}else{
				echo "Error Al Actualizar";
				}
		}
		//---------------------------------------------------------------------------------------------------------------------------
		function eliminar($pk){
			$queryDelete = "delete from vehiculos where id = ".$pk;
			$delete =mysqli_query($this->conn, $queryDelete);
			if($delete){						
				echo "<script>
						alert('Eliminacion exitosa');
						location.href='../vista/modificarInformacion.php';
				</script>";				
			}else{
				echo "<script>
						alert('Error Al Eliminar');
						location.href='../vista/modificarInformacion.php';
				</script>";	
				}
		}
		//--------------------------------------------------------------------------------------------------------------
		function buscar($dato){
			$sql="select * 
			from vehiculos
			where modelo like '%".$dato."%' OR nombre like '%".$dato."%' OR marca like '%".$dato."%' OR placa like '%".$dato."%' OR color like '%".$dato."%' OR ciudad like '%".$dato."%'";
			$rs=mysqli_query($this->conn, $sql);
			$i=0;
			if(mysqli_num_rows($rs)<1){
				echo "La busqueda no obtuvo resultados.";	
			}else{
			echo "<table border='0' align='center' class='table_' ><thead>
					<th>Modelo</th>
					<th>Nombre</th>
					<th>Marca</th>
					<th>Placa</th>
					<th>Color</th>
					<th>Ciudad</th>
					<th>Modificar</th>
					<th>Eliminar</th>
				</thead><tbody>";
			 while ($row = mysqli_fetch_array($rs)){	 								
			echo "<tr><td align='center'>".$row["modelo"]."</td>";
			echo "<td align='center'>".$row["nombre"]."</td>";
			echo "<td align='center'>".$row["marca"]."</td>";
			echo "<td align='center'>".$row["placa"]."</td>";
			echo "<td align='center'>".$row["color"]."</td>";
			echo "<td align='center'>".$row["ciudad"]."</td>";
			echo '<td align="center">
			<a class="fancybox fancybox.iframe" href="../vista/fancyBoxModificar.php?id='.$row["id"].'&modelo='.$row["modelo"].'&nombre='.$row["nombre"].'&marca='.$row["marca"].'&placa='.$row["placa"].'&color='.$row["color"].'&ciudad='.$row["ciudad"].'" >Editar</a></td>';
			echo "<td><a href='../control/controlador.php?eliminar=si&codigo=".$row["id"]."'>Eliminar</a></td></tr>";
			$i++; 
			}			
			}
			echo "</tbody></table>";
		}
	}
?>