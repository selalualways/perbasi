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
			'menu_home' => '',
			'menu_klub' => 'active',
			'menu_pemain' => '',
			'menu_pelatih' => '',
			'menu_wasit' => '',
			'menu_berita' => '',
			'data_klub' =>$this->Klub_model->get_all_klub(),

		);

		$this->template->load('template/template_admin', 'klub/klub_list', $data);
	}
	public function hapus_klub($id_klub)
	{
	
		$this->Klub_model->delete_klub($id_klub);

		redirect(site_url('Klub'));
	
    }
	public function tambah_klub()
	{
		$data = array(
			'menu_home' => '',
			'menu_klub' => 'active',
			'menu_pemain' => '',
			'menu_pelatih' => '',
			'menu_wasit' => '',
			'menu_berita' => '',
			'judul' => 'TAMBAH KLUB',
			'action' => site_url('klub/proses_tambah_klub'),
			'id_klub' => set_value('id_klub'),
			'nama_klub' => set_value('nama_klub'),
			'pengurus' => set_value('pengurus'),
			'logo' => set_value('logo'),
			'struktur_pengurus' => set_value('struktur_pengurus'),
		);
		
		$this->template->load('template/template_admin', 'klub/form_klub', $data);
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

	public function ubah_klub($id_klub)
	{
		$data_klub = $this->Klub_model->get_klub($id_klub);
		$data = array(
			'menu_home' => '',
			'menu_klub' => 'active',
			'menu_pemain' => '',
			'menu_pelatih' => '',
			'menu_wasit' => '',
			'menu_berita' => '',
			'judul' => 'UBAH KLUB',
			'action' => site_url('klub/proses_ubah_klub'),
			'id_klub' => $data_klub->id_klub,
			'nama_klub' => $data_klub->nama_klub,
			'pengurus' => $data_klub->pengurus,
			'logo' => $data_klub->logo,
			'struktur_pengurus' => $data_klub->struktur_pengurus,
			
		);
		
		$this->template->load('template/template_admin', 'klub/form_klub', $data);
	}

	public function proses_ubah_klub()
	{
		$this->_rules();
		if($this->form_validation->run() == FALSE) {
			$id_klub = $this->input->post('id_klub');
			$this->ubah_klub($id_klub);
		} else {
			$id_klub = $this->input->post('id_klub');
			$data = array(
				'nama_klub' => $this->input->post('nama_klub'),
				'pengurus' => $this->input->post('pengurus'),
				'logo' => $this->input->post('logo'),
				'struktur_pengurus' => $this->input->post('struktur_pengurus'),
			);

			$this->Klub_model->update($id_klub, $data);
			redirect(site_url('Klub'));
		}
	}
}