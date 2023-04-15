<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemain extends CI_Controller {

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
    	$this->load->model('Pemain_model');
	}
	
	 public function index()
	{
		$data = array(
		'data_pemain' =>$this->Pemain_model->get_all_pemain(),

		);

		$this->load->view('pemain/Pemain_list', $data);
	}
	public function hapus_pemain($nik)
	{
	
		$this->Pemain_model->delete_pemain($nik);

		redirect(site_url('Pemain'));
	
    }
	public function tambah_pemain()
	{
		$data = array(
			'action' => site_url('pemain/proses_tambah_pemain')
		);
		$this->load->view('pemain/form_tambah_pemain', $data);
	}

	public function _rules()
	{
		$this->form_validation->set_rules('nik','NIK','trim|required');
		$this->form_validation->set_rules('nama_pemain','Nama Pemain','trim|required');
		$this->form_validation->set_rules('id_klub','ID Klub','trim|required');
		$this->form_validation->set_rules('tempat_lahir','Tempat Lahir','trim|required');
        $this->form_validation->set_rules('tanggal_lahir','Tanggal Lahir','trim|required');
        $this->form_validation->set_rules('tinggi_badan','Tinggi Badan','trim|required');
        $this->form_validation->set_rules('berat_badan','Berat Badan','trim|required');
        $this->form_validation->set_rules('foto_pemain','Foto Pemain','trim|required');
	}

	public function proses_tambah_pemain()
	{
		$this->_rules();
		if($this->form_validation->run() == FALSE) {
			$this->tambah_pemain();
		} else {
			$data = array(
			'nik' => $this->input->post('nik'),
			'nama_pemain' => $this->input->post('nama_pemain'),
            'id_klub' => $this->input->post('id_klub'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'tinggi_badan' => $this->input->post('tinggi_badan'),
            'berat_badan' => $this->input->post('berat_badan'),
            'foto_pemain' => $this->input->post('foto_pemain'),
            );
			$this->Pemain_model->insert($data);
			redirect(site_url('Pemain'));
		}
	}
}