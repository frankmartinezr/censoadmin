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

}