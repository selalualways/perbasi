<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wasit extends CI_Controller {

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
    	$this->load->model('Wasit_model');
	}
	
	 public function index()
	{
		$data = array(
			'menu_home' => '',
			'menu_klub' => '',
			'menu_pemain' => '',
            'menu_pelatih' => '',
            'menu_wasit' => 'active',
			'menu_berita' => '',
			'data_wasit' =>$this->Wasit_model->get_all_wasit(),

		);

		$this->template->load('template/template_admin', 'wasit/wasit_list', $data);
	}
	public function hapus_wasit($nik)
	{
	
		$this->Wasit_model->delete_wasit($nik);

		redirect(site_url('Wasit'));
	
    }
	public function tambah_wasit()
	{
		$data = array(
			'menu_home' => '',
			'menu_klub' => '',
			'menu_pemain' => '',
            'menu_pelatih' => '',
            'menu_wasit' => 'active',
			'menu_berita' => '',
			'judul' => 'TAMBAH WASIT',
			'action' => site_url('wasit/proses_tambah_wasit'),
			'nik' => set_value('nik'),
			'nama_wasit' => set_value('nama_wasit'),
			'lisensi' => set_value('lisensi'),
		);
		
		$this->template->load('template/template_admin', 'wasit/form_wasit', $data);
	}

	public function _rules()
	{
		$this->form_validation->set_rules('nik','NIK','trim|required');
		$this->form_validation->set_rules('nama_wasit','Nama Wasit','trim|required');
		$this->form_validation->set_rules('lisensi','Lisensi','trim|required');
	}

	public function proses_tambah_wasit()
	{
		$this->_rules();
		if($this->form_validation->run() == FALSE) {
			$this->tambah_wasit();
		} else {
			$data = array(
			'nik' => $this->input->post('nik'),
			'nama_wasit' => $this->input->post('nama_wasit'),
			'lisensi' => $this->input->post('lisensi'),
			);

			$this->Wasit_model->insert($data);
			redirect(site_url('Wasit'));
		}
	}

	public function ubah_wasit($nik)
	{
		$data_wasit = $this->Wasit_model->get_wasit($nik);
		$data = array(
			'menu_home' => '',
			'menu_klub' => '',
			'menu_pemain' => '',
            'menu_pelatih' => '',
            'menu_wasit' => 'active',
			'menu_berita' => '',
			'judul' => 'UBAH WASIT',
			'action' => site_url('wasit/proses_ubah_wasit'),
			'nik' => $data_wasit->nik,
			'nama_wasit' => $data_wasit->nama_wasit,
			'lisensi' => $data_wasit->lisensi,
		);
		
		$this->template->load('template/template_admin', 'wasit/form_wasit', $data);
	}

	public function proses_ubah_wasit()
	{
		$this->_rules();
		if($this->form_validation->run() == FALSE) {
			$nik = $this->input->post('nik');
			$this->ubah_wasit($nik);
		} else {
			$nik = $this->input->post('nik');
			$data = array(
				'nik' => $this->input->post('nik'),
				'nama_wasit' => $this->input->post('nama_wasit'),
				'lisensi' => $this->input->post('lisensi'),
			);

			$this->Wasit_model->update($nik, $data);
			redirect(site_url('Wasit'));
		}
	}
}