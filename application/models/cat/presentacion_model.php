<?php
/*

*/
class Presentacion_model extends CI_Model {

	function crear($idpresentacion, $descripcion, $marca_id, $activo, $usumodif)
	{
		$query = $this->db->query("usp_apppresentacion 1, '$idpresentacion', '$descripcion', '$marca_id', '$activo', '$usumodif'");

		return $query->result();
	}

	function editar($idpresentacion, $descripcion, $marca_id, $activo, $usumodif)
	{
		$query = $this->db->query("usp_apppresentacion 2, '$idpresentacion', '$descripcion', '$marca_id', '$activo', '$usumodif'");

		return $query->result();
	}

	function eliminar($idpresentacion)
	{
		$query = $this->db->query("usp_apppresentacion 3, '$idpresentacion', '', '', '', ''");

		return $query->result();
	}

	function registros()
	{
		$query = $this->db->query("usp_apppresentacion 4, '', '', '', '', ''");

		return $query->result();
	}
}