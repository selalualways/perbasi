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
		$this->load->model('Klub_model');
	}
	
	 public function index()
	{
		$data = array(
			'menu_home' => '',
			'menu_klub' => '',
			'menu_pemain' => 'active',
			'menu_pelatih' => '',
			'menu_wasit' => '',
			'menu_berita' => '',
			'data_pemain' =>$this->Pemain_model->get_all_pemain(),

		);

		$this->template->load('template/template_admin', 'pemain/pemain_list', $data);
	}
	public function hapus_pemain($nik)
	{
	
		$this->Pemain_model->delete_pemain($nik);

		redirect(site_url('Pemain'));
	
    }
	public function tambah_pemain()
	{
		$data = array(
			'menu_home' => '',
			'menu_klub' => '',
			'menu_pemain' => 'active',
			'menu_pelatih' => '',
			'menu_wasit' => '',
			'menu_berita' => '',
			'judul' => 'TAMBAH Pemain',
			'action' => site_url('pemain/proses_tambah_pemain'),
			'data_klub' => $this->Klub_model->get_all_klub(),
			'nik' => set_value('nik'),
			'nama_pemain' => set_value('nama_pemain'),
			'id_klub' => set_value('id_klub'),
			'tempat_lahir' => set_value('tempat_lahir'),
			'tanggal_lahir' => set_value('tanggal_lahir'),
            'tinggi_badan' => set_value('tinggi_badan'),
            'berat_badan' => set_value('berat_badan'),
            'foto_pemain' => set_value('foto_pemain'),
		);
		
		$this->template->load('template/template_admin', 'pemain/form_pemain', $data);
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
			);

			$this->Pemain_model->insert($data);

			$nik = $this->input->post('nik');

			// setting konfigurasi upload
			$config['upload_path'] = './uploads/fotopemain/';
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['overwrite'] = true;
			$filename = 'FotoPemain-'.$nik;
			$config['file_name'] = $filename;
	
			// load library upload
			$this->load->library('upload', $config);
	
			$this->upload->initialize($config);
			
			if($_FILES['foto_pemain']['name'])
			{
				if ($this->upload->do_upload('foto_pemain'))
				{
					$uploadfotopemain = $this->upload->data();
					$data = array(
					  'namafile' =>$uploadfotopemain['file_name'],
					  'type' =>$uploadfotopemain['file_type']
					  
					);
					$fotopemain = $data['namafile'];

					$nik = $this->input->post('nik');
	
					$data = array(
						'foto_pemain' => $fotopemain,
					);
		
					$this->Pemain_model->update($nik, $data);
				}
	
			}

			redirect(site_url('Pemain'));
		}
	}

	public function ubah_pemain($nik)
	{
		$data_pemain = $this->Pemain_model->get_pemain($nik);
		$data = array(
			'menu_home' => '',
			'menu_klub' => '',
			'menu_pemain' => 'active',
			'menu_pelatih' => '',
			'menu_wasit' => '',
			'menu_berita' => '',
			'judul' => 'UBAH PEMAIN',
			'action' => site_url('pemain/proses_ubah_pemain'),
			'nik' => $data_pemain->nik,
			'nama_pemain' => $data_pemain->nama_pemain,
			'id_klub' => $data_pemain->id_klub,
			'tempat_lahir' => $data_pemain->tempat_lahir,
			'tanggal_lahir' => $data_pemain->tanggal_lahir,
            'tinggi_badan' => $data_pemain->tinggi_badan,
            'berat_badan' => $data_pemain->berat_badan,
            'foto_pemain' => $data_pemain->foto_pemain,
			'data_klub' => $this->Klub_model->get_all_klub(),
		);
		
		$this->template->load('template/template_admin', 'pemain/form_pemain', $data);
	}

	public function proses_ubah_pemain()
	{
		$this->_rules();
		if($this->form_validation->run() == FALSE) {
			$nik = $this->input->post('nik');
			$this->ubah_pemain($nik);
		} else {
			$nik = $this->input->post('nik');
			$data = array(
				'nama_pemain' => $this->input->post('nama_pemain'),
				'id_klub' => $this->input->post('id_klub'),
				'tempat_lahir' => $this->input->post('tempat_lahir'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'tinggi_badan' => $this->input->post('tinggi_badan'),
                'berat_badan' => $this->input->post('berat_badan'),
                'foto_pemain' => $this->input->post('foto_pemain'),
			);

			$this->Pemain_model->update($nik, $data);
			redirect(site_url('Pemain'));
		}
	}
}