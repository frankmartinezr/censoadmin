<?php
/*

*/
class Apoyo_model extends CI_Model {

	function crear($idapoyo, $descripcion, $activo, $usumodif)
	{
		$query = $this->db->query("usp_appapoyo 1, '$idapoyo', '$descripcion', '$activo', '$usumodif'");

		return $query->result();
	}

	function editar($idapoyo, $descripcion, $activo, $usumodif)
	{
		$query = $this->db->query("usp_appapoyo 2, '$idapoyo', '$descripcion', '$activo', '$usumodif'");

		return $query->result();
	}

	function eliminar($idapoyo)
	{
		$query = $this->db->query("usp_appapoyo 3, '$idapoyo', '', '', ''");

		return $query->result();
	}

	function registros()
	{
		$query = $this->db->query("usp_appapoyo 4, '', '', '', ''");

		return $query->result();
	}

	function tipos()
	{
		$query = $this->db->query("usp_appapoyo 5, '', '', '', ''");

		return $query->result();
	}
}