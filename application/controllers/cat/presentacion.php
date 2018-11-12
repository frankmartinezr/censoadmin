<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Presentacion extends CI_Controller {

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
			$this->load->model('cat/presentacion_model');
			$this->load->model('cat/marca_model');
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
		$data['registros'] = $this->presentacion_model->registros();
		$data['marcas'] = $this->marca_model->registros();
		
		$this->load->view('templates/header', $data);
		$this->load->view('cat/presentacion_index_view');
		$this->load->view('templates/footer');
	}

	public function create()
	{
		$idpresentacion			= $this->input->post('idpresentacion');
		$descripcion	= $this->input->post('descripcion');
		$marca_id	= $this->input->post('marca_id');
		$activo			= $this->input->post('activo');
		$usumodif		= $this->input->post('usumodif');

		$result = $this->presentacion_model->crear($idpresentacion, $descripcion, $marca_id, $activo, $usumodif);

		$json = get_object_vars($result[0]);
        echo json_encode($json);
	}

	public function edit()
	{
		$idpresentacion			= $this->input->post('idpresentacion');
		$descripcion	= $this->input->post('descripcion');
		$marca_id	= $this->input->post('marca_id');
		$activo			= $this->input->post('activo');
		$usumodif		= $this->input->post('usumodif');

		$result = $this->presentacion_model->editar($idpresentacion, $descripcion, $marca_id, $activo, $usumodif);

		$json = get_object_vars($result[0]);
        echo json_encode($json);
	}

	public function delete()
	{
		$idpresentacion = $this->input->post('idpresentacion');
		$result = $this->presentacion_model->eliminar($idpresentacion);

		$json = get_object_vars($result[0]);
		echo json_encode($json);
	}
}
