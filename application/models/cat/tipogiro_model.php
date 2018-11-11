<?php
/*

*/
class TipoGiro_model extends CI_Model {

	function crear($idtipogiro, $descripcion, $activo, $usumodif)
	{
		$query = $this->db->query("usp_apptipogiro 1, '$idtipogiro', '$descripcion', '$activo', '$usumodif'");

		return $query->result();
	}

	function editar($idtipogiro, $descripcion, $activo, $usumodif)
	{
		$query = $this->db->query("usp_apptipogiro 2, '$idtipogiro', '$descripcion', '$activo', '$usumodif'");

		return $query->result();
	}

	function eliminar($idtipogiro)
	{
		$query = $this->db->query("usp_apptipogiro 3, '$idtipogiro', '', '', ''");

		return $query->result();
	}

	function registros()
	{
		$query = $this->db->query("usp_apptipogiro 4, '', '', '', ''");

		return $query->result();
	}
}