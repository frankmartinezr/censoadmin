<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modulo extends CI_Controller {

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
			$this->load->model('adming/modulo_model');
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
		$data['registros'] = $this->modulo_model->obtenerRegistros();
		$data['categorias'] = $this->modulo_model->obtenerCategorias();
		
		$this->load->view('templates/header', $data);
		$this->load->view('adming/modulo_index_view');
		$this->load->view('adming/modulo_script_view');
		$this->load->view('templates/footer');
	}

	private function main()
	{
		$data['registros'] = $this->modulo_model->obtenerRegistros();
		$data['categorias'] = $this->modulo_model->obtenerCategorias();

		$main = $this->load->view('adming/modulo_index_view', $data, TRUE);

		return $main;
	}

	public function edit()
	{
		$idmodulo		= $this->input->post('idmodulo');
		$descripcion	= $this->input->post('descripcion');
		$icono			= $this->input->post('icono');
		$ruta			= $this->input->post('ruta');
		$activo			= $this->input->post('activo');
		$parent			= $this->input->post('parent');
		$usumodif		= $this->input->post('usumodif');

		$result = $this->modulo_model->editar($idmodulo, $descripcion, $icono, $ruta, $activo, $parent, $usumodif);

		$json = get_object_vars($result[0]);
		$json['main'] = $this->main();
        echo json_encode($json);
	}
}
