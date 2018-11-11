<?php
/*

*/
class Giro_model extends CI_Model {

	function crear($idgiro, $descripcion, $tipogiro_id, $activo, $usumodif)
	{
		$query = $this->db->query("usp_appgiro 1, '$idgiro', '$descripcion', '$tipogiro_id', '$activo', '$usumodif'");

		return $query->result();
	}

	function editar($idgiro, $descripcion, $tipogiro_id, $activo, $usumodif)
	{
		$query = $this->db->query("usp_appgiro 2, '$idgiro', '$descripcion', '$tipogiro_id', '$activo', '$usumodif'");

		return $query->result();
	}

	function eliminar($idgiro)
	{
		$query = $this->db->query("usp_appgiro 3, '$idgiro', '', '', '', ''");

		return $query->result();
	}

	function registros()
	{
		$query = $this->db->query("usp_appgiro 4, '', '', '', '', ''");

		return $query->result();
	}
}