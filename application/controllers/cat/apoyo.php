<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apoyo extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct() {
		parent::__construct();

		$logged_in = $this->session->userdata('logged_in');

		if ($logged_in) {
			#carga modelos necesarios:
			$this->load->model('cat/apoyo_model');
		}
		else {
			#no existe sesion activa
			header("Location: ".base_url('welcome/logout/1'));
		}
	}

	public function index()
	{
		$user = $this->session->userdata('user_cv');
		$data['menu'] = TRUE;
		$data['perfil'] = $this->load->view('login/modal_perfil', '', TRUE);
		$data['side_menu'] = $this->session->userdata('side_menu');
		$data['registros'] = $this->apoyo_model->registros();
		
		$this->load->view('templates/header', $data);
		$this->load->view('cat/apoyo_index_view');
		$this->load->view('templates/footer');
	}

	public function create()
	{
		$idapoyo		= $this->input->post('idapoyo');
		$descripcion	= $this->input->post('descripcion');
		$activo			= $this->input->post('activo');
		$usumodif		= $this->input->post('usumodif');

		$result = $this->apoyo_model->crear($idapoyo, $descripcion, $activo, $usumodif);

		$json = get_object_vars($result[0]);
        echo json_encode($json);
	}

	public function edit()
	{
		$idapoyo		= $this->input->post('idapoyo');
		$descripcion	= $this->input->post('descripcion');
		$activo			= $this->input->post('activo');
		$usumodif		= $this->input->post('usumodif');

		$result = $this->apoyo_model->editar($idapoyo, $descripcion, $activo, $usumodif);

		$json = get_object_vars($result[0]);
        echo json_encode($json);
	}

	public function delete()
	{
		$idapoyo = $this->input->post('idapoyo');
		$result = $this->apoyo_model->eliminar($idapoyo);

		$json = get_object_vars($result[0]);
		echo json_encode($json);
	}
}
