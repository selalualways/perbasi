<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelatih extends CI_Controller {

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
    	$this->load->model('Pelatih_model');
	}
	
	 public function index()
	{
		$data = array(
			'menu_home' => '',
			'menu_klub' => '',
			'menu_pemain' => '',
            'menu_pelatih' => 'active',
			'menu_wasit' => '',
			'menu_berita' => '',
			'data_pelatih' =>$this->Pelatih_model->get_all_pelatih(),

		);

		$this->template->load('template/template_admin', 'pelatih/pelatih_list', $data);
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}
	public function hapus_pelatih($nik)
	{
	
		$this->Pelatih_model->delete_pelatih($nik);

		redirect(site_url('Pelatih'));
	
    }
	public function tambah_pelatih()
	{
		$data = array(
			'menu_home' => '',
			'menu_klub' => '',
			'menu_pemain' => '',
            'menu_pelatih' => 'active',
			'menu_wasit' => '',
			'menu_berita' => '',
			'judul' => 'TAMBAH PELATIH',
			'action' => site_url('pelatih/proses_tambah_pelatih'),
			'nik' => set_value('nik'),
			'nama_pelatih' => set_value('nama_pelatih'),
			'lisensi' => set_value('lisensi'),
		);
		
		$this->template->load('template/template_admin', 'pelatih/form_pelatih', $data);
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('nik','NIK','trim|required');
		$this->form_validation->set_rules('nama_pelatih','Nama Pelatih','trim|required');
		$this->form_validation->set_rules('lisensi','Lisensi','trim|required');
	}

	public function proses_tambah_pelatih()
	{
		$this->_rules();
		if($this->form_validation->run() == FALSE) {
			$this->tambah_pelatih();
		} else {
			$data = array(
			'nik' => $this->input->post('nik'),
			'nama_pelatih' => $this->input->post('nama_pelatih'),
			'lisensi' => $this->input->post('lisensi'),
			);

			$this->Pelatih_model->insert($data);
			redirect(site_url('Pelatih'));
		}
	}

	public function ubah_pelatih($nik)
	{
		$data_pelatih = $this->Pelatih_model->get_pelatih($nik);
		$data = array(
			'menu_home' => '',
			'menu_klub' => '',
			'menu_pemain' => '',
            'menu_pelatih' => 'active',
			'menu_wasit' => '',
			'menu_berita' => '',
			'judul' => 'UBAH PELATIH',
			'action' => site_url('pelatih/proses_ubah_pelatih'),
			'nik' => $data_pelatih->nik,
			'nama_pelatih' => $data_pelatih->nama_pelatih,
			'lisensi' => $data_pelatih->lisensi,
		);
		
		$this->template->load('template/template_admin', 'pelatih/form_pelatih', $data);
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}

	public function proses_ubah_pelatih()
	{
		$this->_rules();
		if($this->form_validation->run() == FALSE) {
			$nik = $this->input->post('nik');
			$this->ubah_pelatih($nik);
		} else {
			$nik = $this->input->post('nik');
			$data = array(
				'nik' => $this->input->post('nik'),
				'nama_pelatih' => $this->input->post('nama_pelatih'),
				'lisensi' => $this->input->post('lisensi'),
			);

			$this->Pelatih_model->update($nik, $data);
			redirect(site_url('Pelatih'));
		}
	}
}