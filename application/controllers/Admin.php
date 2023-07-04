<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function construct()
	{
		parent::__construct();
		$this->load->model('Klub_model');
	}

	public function index()
	{
		
		$data = array(
			'menu_home' => 'active',
			'menu_klub' => '',
			'menu_pemain' => '',
			'menu_pelatih' => '',
			'menu_wasit' => '',
			'menu_berita' => '',
			
		);

		

		$this->template->load('template/template_admin', 'admin/dashboard', $data);
		
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}
	

}
