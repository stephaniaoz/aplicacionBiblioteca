<?php
include("C:xampp\htdocs\webservicebiblioteca\Model\TbBiblioteca.php");

if($_REQUEST){

	$modulo = isset($_REQUEST['modulo'])?$_REQUEST['modulo']:'';
	$componente = isset($_REQUEST['componente'])?$_REQUEST['componente']:'';

	if($modulo == 'informe'){

		if($componente == 'listarDisponibilidad'){
			$obj = new TbBibliotecaController();
			$obj->listarDisponibilidades();
		}

		if($componente == 'listarTiquete'){
			$obj = new TbBibliotecaController();
			$obj->listarTiquetes();
		}

	}

}

/**
* 
*/
class TbBibliotecaController
{

	private $arrayDisponibilidad = array();
	private $arrayTiquetes = array();

	function listarDisponibilidades(){

		$lista = "	<div class='table-responsive'>
						<table class='table table-striped'>
							<tr>
								<th>Libro</th>
								<th>Estante</th>
								<th>Localizacion</th>							
								<th>CodBarras</th>
								<th>Signatura</th>
								<th>Fecha creación</th>
								<th>Fecha modificación</th>
								<th>Usuario</th>
								<th>Estado</th>
								<th>Fecha prestamo</th>
								<th>Edición</th>
								<th>Categoria</th>
							</tr>
							";
		$detalle = "";
		$obj = new TbBiblioteca();
		$result = $obj->listaDisponibilildad();


		$count = 0;

		while ($arrayDispo = pg_fetch_assoc($result)) {

			$csalon = '';

			$this->arrayDisponibilidad[$count]= $arrayDispo['libro_titulo'];

			$detalle .= "<tr><td>".$arrayDispo['libro_titulo']."</td>";
			$detalle .= "<td>".$arrayDispo['estante_nombre']."</td>";
			$detalle .= "<td>".$arrayDispo['localizacion_localizacion']."</td>";
			$detalle .= "<td>".$arrayDispo['itelibdis_codigobarras']."</td>";
			$detalle .= "<td>".$arrayDispo['itelibdis_signaturatopografica']."</td>";
			$detalle .= "<td>".$arrayDispo['itelibdis_fechacreacion']."</td>";
			$detalle .= "<td>".$arrayDispo['itelibdis_fechamodificacion']."</td>";
			$detalle .= "<td>".$arrayDispo['usuario_nombre']."</td>";
			$detalle .= "<td>".$arrayDispo['estado_nombre']."</td>";
			$detalle .= "<td>".$arrayDispo['itelibdis_fechaprestamo']."</td>";
			$detalle .= "<td>".$arrayDispo['itelibdis_edicion']."</td>";
			$detalle .= "<td>".$arrayDispo['categoria_nombre'].$csalon."</td></tr>";

			$count++;
		}

		$final = "			
						</table>
					</div>";

		$cadenacompleta = $lista.$detalle.$final;

		if($count == 0){
			echo "<div class='alert alert-warning'>
					  	<strong>Warning! </strong>No existen disponiblidades.
					</div>";
		}else{
			echo $cadenacompleta;
		}


	}
	

	function listarTiquetes(){

		$lista = "	<div class='table-responsive'>
						<table class='table table-striped'>
							<tr>
								<th>Código tiquete</th>
								<th>Fecha caducidad</th>
								<th>Hora caducidad</th>
								<th>Código estudiante</th>
								<th>Correo estudiante</th>
								<th>Observación</th>
								<th>Libro</th>
								<th>Estante</th>
								<th>Localizacion</th>							
								<th>CodBarras</th>
								<th>Signatura</th>
								<th>Usuario</th>
								<th>Estado</th>
								<th>Edición</th>
								<th>Categoria</th>
							</tr>
							";
		$detalle = "";
		$obj = new TbBiblioteca();
		$result = $obj->listaTiquete();

		$count = 0;

		while ($arrayTiquete = pg_fetch_assoc($result)) {

			$this->arrayTiquetes[$count]= $arrayTiquete['libro_titulo'];

			$detalle .= "<tr><td>".$arrayTiquete['tiquete_codigo']."</td>";
			$detalle .= "<td>".$arrayTiquete['tiquete_fechacaducidad']."</td>";
			$detalle .= "<td>".$arrayTiquete['tiquete_horacaducidad']."</td>";
			$detalle .= "<td>".$arrayTiquete['tiquete_codigoestudiante']."</td>";
			$detalle .= "<td>".$arrayTiquete['tiquete_correoestudiante']."</td>";
			$detalle .= "<td>".$arrayTiquete['tiquete_observacionusuario']."</td>";
			$detalle .= "<td>".$arrayTiquete['libro_titulo']."</td>";
			$detalle .= "<td>".$arrayTiquete['estante_nombre']."</td>";
			$detalle .= "<td>".$arrayTiquete['localizacion_localizacion']."</td>";
			$detalle .= "<td>".$arrayTiquete['itelibdis_codigobarras']."</td>";
			$detalle .= "<td>".$arrayTiquete['itelibdis_signaturatopografica']."</td>";
			$detalle .= "<td>".$arrayTiquete['usuario_nombre']."</td>";
			$detalle .= "<td>".$arrayTiquete['estado_nombre']."</td>";
			$detalle .= "<td>".$arrayTiquete['itelibdis_edicion']."</td>";
			$detalle .= "<td>".$arrayTiquete['categoria_nombre']."</td></tr>";

			$count++;
		}

		$final = "			
						</table>
					</div>";

		$cadenacompleta = $lista.$detalle.$final;

		if($count == 0){
			echo "<div class='alert alert-warning'>
					  	<strong>Warning! </strong>No existen disponiblidades.
					</div>";
		}else{
			echo $cadenacompleta;
		}


	}
	
}

?>