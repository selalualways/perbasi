<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

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
    	$this->load->model('Berita_model');
	}
	
	 public function index()
	{
		$data = array(
			'menu_home' => '',
			'menu_klub' => '',
			'menu_pemain' => '',
			'menu_pelatih' => '',
			'menu_berita' => 'active',
			'data_berita' =>$this->Berita_model->get_all_berita(),

		);

		$this->template->load('template/template_admin', 'berita/berita_list', $data);
	}
	public function hapus_berita($id_berita)
	{
	
		$this->Berita_model->delete_berita($id_berita);

		redirect(site_url('Berita'));
	
    }
	public function tambah_berita()
	{
		$data = array(
			'menu_home' => '',
			'menu_klub' => '',
			'menu_pemain' => '',
			'menu_pelatih' => '',
			'menu_berita' => 'active',
			'judul' => 'TAMBAH BERITA',
			'action' => site_url('berita/proses_tambah_berita'),
			'id_berita' => set_value('id_berita'),
			'tanggal' => set_value('tanggal'),
			'judul' => set_value('judul'),
			'foto' => set_value('foto'),
			'isi' => set_value('isi'),
		);
		
		$this->template->load('template/template_admin', 'berita/form_berita', $data);
	}

	public function _rules()
	{
		$this->form_validation->set_rules('tanggal','Tanggal','trim|required');
		$this->form_validation->set_rules('judul','Judul','trim|required');
		$this->form_validation->set_rules('foto','Foto','trim|required');
		$this->form_validation->set_rules('isi','Isi Berita','trim|required');
	}

	public function proses_tambah_berita()
	{
		$this->_rules();
		if($this->form_validation->run() == FALSE) {
			$this->tambah_berita();
		} else {
			$data = array(
			'tanggal' => $this->input->post('tanggal'),
			'judul' => $this->input->post('judul'),
			'foto' => $this->input->post('foto'),
			'isi' => $this->input->post('isi'),
			);

			$this->Berita_model->insert($data);
			redirect(site_url('Berita'));
		}
	}

	public function ubah_berita($id_berita)
	{
		$data_berita = $this->Berita_model->get_berita($id_berita);
		$data = array(
			'menu_home' => '',
			'menu_klub' => '',
			'menu_pemain' => '',
			'menu_pelatih' => '',
			'menu_berita' => 'active',
			'judul' => 'UBAH BERITA',
			'action' => site_url('berita/proses_ubah_berita'),
			'id_berita' => $data_berita->id_berita,
			'tanggal' => $data_berita->tanggal,
			'judul' => $data_berita->judul,
			'foto' => $data_berita->foto,
			'isi' => $data_berita->isi,
		);
		
		$this->template->load('template/template_admin', 'berita/form_berita', $data);
	}

	public function proses_ubah_berita()
	{
		$this->_rules();
		if($this->form_validation->run() == FALSE) {
			$id_berita = $this->input->post('id_berita');
			$this->ubah_berita($id_berita);
		} else {
			$id_berita = $this->input->post('id_berita');
			$data = array(
				'tanggal' => $this->input->post('tanggal'),
				'judul' => $this->input->post('judul'),
				'foto' => $this->input->post('foto'),
				'isi' => $this->input->post('isi'),
			);

			$this->Berita_model->update($id_berita, $data);
			redirect(site_url('Berita'));
		}
	}
}