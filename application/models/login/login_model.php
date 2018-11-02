<?php

class Login_model extends CI_Model {

        function obtenerLogin($user, $password, $keypass='@P4sw0rd_!')
        {
                $query = $this->db->query("usp_sisusuario 1, '$user', '$password', '$keypass'");

                return $query->result();
        }

}