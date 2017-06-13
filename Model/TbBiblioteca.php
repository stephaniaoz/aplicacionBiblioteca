<?php
include_once("C:xampp\htdocs\webservicebiblioteca\db\database_utilities.php");

Class TbBiblioteca{

	public function listaDisponibilildad(){

		$query ="	SELECT lb.libro_titulo, es.estante_nombre, l.localizacion_localizacion, e.estado_nombre, c.categoria_nombre, u.usuario_nombre, id.* 
					FROM tb_itemlibrodisponibilidad id
					JOIN tb_libro lb ON lb.libro_codigo = id.libro_codigo
					JOIN tb_estante es ON es.estante_codigo = id.estante_codigo
					JOIN tb_estado e ON e.estado_codigo = id.estado_codigo
					JOIN tb_categoria c ON c.categoria_codigo = id.categoria_codigo
					JOIN tb_usuario u ON u.usuario_codigo = id.usuario_codigo
					JOIN tb_localizacion l ON l.localizacion_codigo = es.localizacion_codigo
					ORDER BY lb.libro_titulo, id.itelibdis_fechacreacion  ";

		$result = pg_query($query);

		return $result;
	}

	public function listaTiquete(){

		$query ="	SELECT lb.libro_titulo, es.estante_nombre, l.localizacion_localizacion, e.estado_nombre, c.categoria_nombre, u.usuario_nombre, t.*, id.*
					FROM tb_tiquete t
					JOIN tb_itemlibrodisponibilidad id ON id.itelibdis_codigo = t.itelibdis_codigo
					JOIN tb_libro lb ON lb.libro_codigo = id.libro_codigo
					JOIN tb_estante es ON es.estante_codigo = id.estante_codigo
					JOIN tb_estado e ON e.estado_codigo = id.estado_codigo
					JOIN tb_categoria c ON c.categoria_codigo = id.categoria_codigo
					JOIN tb_usuario u ON u.usuario_codigo = id.usuario_codigo
					JOIN tb_localizacion l ON l.localizacion_codigo = es.localizacion_codigo
					ORDER BY t.tiquete_fechacreacion, t.tiquete_codigoestudiante  ";

		$result = pg_query($query);

		return $result;
	}

	public function listaSolicitud(){

		$query ="	SELECT lb.libro_titulo, es.estante_nombre, l.localizacion_localizacion, e.estado_nombre, c.categoria_nombre, u.usuario_nombre, t.*, id.*
					FROM tb_tiquete t
					JOIN tb_itemlibrodisponibilidad id ON id.itelibdis_codigo = t.itelibdis_codigo
					JOIN tb_libro lb ON lb.libro_codigo = id.libro_codigo
					JOIN tb_estante es ON es.estante_codigo = id.estante_codigo
					JOIN tb_estado e ON e.estado_codigo = id.estado_codigo
					JOIN tb_categoria c ON c.categoria_codigo = id.categoria_codigo
					JOIN tb_usuario u ON u.usuario_codigo = id.usuario_codigo
					JOIN tb_localizacion l ON l.localizacion_codigo = es.localizacion_codigo
					ORDER BY t.tiquete_fechacreacion, t.tiquete_codigoestudiante  ";

		$result = pg_query($query);

		return $result;
	}

}


?>