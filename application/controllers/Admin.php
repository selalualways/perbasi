<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Klub_model');
		$this->load->model('Pemain_model');
		$this->load->model('Pelatih_model');
		$this->load->model('Wasit_model');
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
			'data_klub' =>$this->Klub_model->data_klub(),
			'data_pemain' =>$this->Pemain_model->data_pemain(),
			'data_pelatih' =>$this->Pelatih_model->data_pelatih(),
			'data_wasit' =>$this->Wasit_model->data_wasit(),
		);

		

		$this->template->load('template/template_admin', 'admin/dashboard', $data);
		
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}
	

}
