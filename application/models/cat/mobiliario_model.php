<?php
/*

*/
class Mobiliario_model extends CI_Model {

	function crear($idmobiliario, $descripcion, $activo, $usumodif)
	{
		$query = $this->db->query("usp_appmobiliario 1, '$idmobiliario', '$descripcion', '$activo', '$usumodif'");

		return $query->result();
	}

	function editar($idmobiliario, $descripcion, $activo, $usumodif)
	{
		$query = $this->db->query("usp_appmobiliario 2, '$idmobiliario', '$descripcion', '$activo', '$usumodif'");

		return $query->result();
	}

	function eliminar($idmobiliario)
	{
		$query = $this->db->query("usp_appmobiliario 3, '$idmobiliario', '', '', ''");

		return $query->result();
	}

	function registros()
	{
		$query = $this->db->query("usp_appmobiliario 4, '', '', '', ''");

		return $query->result();
	}
}