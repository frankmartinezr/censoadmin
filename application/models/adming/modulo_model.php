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

	function crear($idmodulo, $descripcion, $icono, $ruta, $activo, $parent, $usumodif)
	{
		$query = $this->db->query("usp_sismodulo 4, '$idmodulo', '$descripcion', '$icono', '$ruta', '$activo', '$parent', '$usumodif'");

		return $query->result();
	}

	function eliminar($idmodulo)
	{
		$query = $this->db->query("usp_sismodulo 5, '$idmodulo', '', '', '', '', '', ''");

		return $query->result();
	}

	function cambio($idmodulo, $activo)
	{
		$query = $this->db->query("usp_sismodulo 6, '$idmodulo', '', '', '', '$activo', '', ''");

		return $query->result();
	}
}