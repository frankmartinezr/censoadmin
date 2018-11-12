<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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

		$this->load->model('login/login_model');
	}
	
	public function index()
	{
		$data['menu'] = FALSE;
		$this->load->view('templates/header', $data);
		$this->load->view('login/sign_in');
		$this->load->view('templates/footer');
	}

	public function login()
	{
		$input_user = $this->input->post('input_user');
		$input_psw = $this->input->post('input_psw');

		$result = $this->login_model->obtenerLogin($input_user, $input_psw, KEY_PASS);
		$json = get_object_vars($result[0]);
		
		if ($json['logged_in']) {
			
			$userdata = array(
				'username'  => $json['nombre'],
				'user_id'	=> $json['idusuario'],
				'user_cv'	=> $json['clave'],
				'user_pic'	=> $json['foto'],
				'email'     => $json['correo'],
				'logged_in' => TRUE
			);

			$this->session->set_userdata($userdata);

			$json['main'] = base_url('welcome/main');
		}
		else {

			$this->logout(FALSE);
		}

		echo json_encode($json);
	}

	public function main()
	{
		$logged_in = $this->session->userdata('logged_in');
		
		if ($logged_in) {
			$user = $this->session->userdata('user_cv');
			$data['menu'] = TRUE;
			$data['perfil'] = $this->load->view('login/modal_perfil', '', TRUE);
			$data['side_menu'] = $this->modulos($user);
			$this->session->set_userdata('side_menu', $data['side_menu']);
			$this->load->view('templates/header', $data);
			$this->load->view('templates/main');
			$this->load->view('templates/footer');
		}
		else {

			$this->logout(TRUE);
		}
	}

	public function logout($redirect)
	{
		$this->session->sess_destroy();
		if ($redirect) { header("Location: ".base_url('')); }
	}

	public function cambioperfil()
	{
		$idusuario = $this->input->post('idusuario');
		$nombre = $this->input->post('nombre');
		$correo = $this->input->post('correo');

		$result = $this->login_model->cambioPerfil($idusuario, $nombre, $correo);
		$json = get_object_vars($result[0]);
		echo json_encode($json);
	}

	private function modulos($user)
	{
		$menu = "";
		$modulos = $this->login_model->modulos($user);

		foreach ($modulos as $modulo) {

			$data['header']=$modulo->header;
			$data['body']=$this->login_model->menus($user, $modulo->idmodulo);

			$menu .= $this->load->view('login/collapsible', $data, TRUE);
		}

		return $menu;
	}
}
