<?php
/*

*/
class Marca_model extends CI_Model {

	function crear($idmarca, $descripcion, $activo, $usumodif)
	{
		$query = $this->db->query("usp_appmarca 1, '$idmarca', '$descripcion', '$activo', '$usumodif'");

		return $query->result();
	}

	function editar($idmarca, $descripcion, $activo, $usumodif)
	{
		$query = $this->db->query("usp_appmarca 2, '$idmarca', '$descripcion', '$activo', '$usumodif'");

		return $query->result();
	}

	function eliminar($idmarca)
	{
		$query = $this->db->query("usp_appmarca 3, '$idmarca', '', '', ''");

		return $query->result();
	}

	function registros()
	{
		$query = $this->db->query("usp_appmarca 4, '', '', '', ''");

		return $query->result();
	}
}