<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Klub extends CI_Controller {

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
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
    	$this->load->model('Klub_model');
	}
	
	 public function index()
	{
		$data = array(
		'data_klub' =>$this->Klub_model->get_all_klub(),

		);

		$this->load->view('klub/Klub_list', $data);
	}
	public function hapus_klub($id_klub)
	{
	
		$this->Klub_model->delete_klub($id_klub);

		redirect(site_url('Klub'));
	
    }
	public function tambah_klub()
	{
		$data = array(
			'action' => site_url('klub/proses_tambah_klub')
		);
		$this->load->view('klub/form_tambah_klub', $data);
	}

	public function _rules()
	{
		$this->form_validation->set_rules('nama_klub','Nama Klub','trim|required');
		$this->form_validation->set_rules('pengurus','Nama Pengurus','trim|required');
		$this->form_validation->set_rules('logo','Logo','trim|required');
		$this->form_validation->set_rules('struktur_pengurus','Struktur Pengurus','trim|required');
	}

	public function proses_tambah_klub()
	{
		$this->_rules();
		if($this->form_validation->run() == FALSE) {
			$this->tambah_klub();
		} else {
			$data = array(
			'nama_klub' => $this->input->post('nama_klub'),
			'pengurus' => $this->input->post('pengurus'),
			'logo' => $this->input->post('logo'),
			'struktur_pengurus' => $this->input->post('struktur_pengurus'),
			);

			$this->Klub_model->insert($data);
			redirect(site_url('Klub'));
		}
	}
}