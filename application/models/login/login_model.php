<?php
/*
[usp_sisusuario]
	opcion
	idusuario
	clave
	correo
	foto
	nombre
	psw
	activo
	ultmodif
	usumodif
	keypass
*/
class Login_model extends CI_Model {

	function obtenerLogin($user, $password, $keypass)
	{
		$query = $this->db->query("usp_sisusuario 1, '', '$user', '', '', '', '$password', '', '', '$keypass'");

		return $query->result();
	}

	function cambioPerfil($idusuario, $nombre, $correo)
	{
		$query = $this->db->query("usp_sisusuario 2, '$idusuario', '', '$correo', '', '$nombre', '', '', '', ''");

		return $query->result();
	}

	function modulos($user)
	{
		$query = $this->db->query("usp_sismenu 1, '$user', 0");

		return $query->result();
	}

	function menus($user, $idmodulo)
	{
		$query = $this->db->query("usp_sismenu 2, '$user', $idmodulo");

		return $query->result();
	}

}