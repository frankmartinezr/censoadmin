<?php
/*

*/
class Modulo_model extends CI_Model {

	function obtenerRegistros()
	{
		$query = $this->db->query("usp_sismodulo 1, 0, '', '', '', 0, 0, 0");

		return $query->result();
	}

	function obtenerCategorias()
	{
		$query = $this->db->query("usp_sismodulo 2, 0, '', '', '', 0, 0, 0");

		return $query->result();
	}

	function editar($idmodulo, $descripcion, $icono, $ruta, $activo, $parent, $usumodif)
	{
		$query = $this->db->query("usp_sismodulo 3, '$idmodulo', '$descripcion', '$icono', '$ruta', '$activo', '$parent', '$usumodif'");

		return $query->result();
	}
}