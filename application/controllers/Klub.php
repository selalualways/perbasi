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
			'data_klub' => $this->Klub_model->get_all_klub(),

		);

		$this->template->load('template/template_admin', 'klub/klub_list', $data);
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
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
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('nama_klub','Nama Klub','trim|required');
		
	}

	public function proses_tambah_klub()
	{
		$this->_rules();
		if($this->form_validation->run() == FALSE) {
			$this->tambah_klub();
		} else {
			$logo = $this->input->post('logo');
			$struktur_pengurus = $this->input->post('struktur_pengurus');
			$data = array(
			'nama_klub' => $this->input->post('nama_klub'),
			'pengurus' => $this->input->post('pengurus'),
			);

			$this->Klub_model->insert($data);

			$lastid = $this->Klub_model->inqlastid()->lastid;

			// Upload Logo
			$config['upload_path'] = './uploads/logo/';
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['overwrite'] = true;
			$filename = 'Logo-'.$lastid;
			$config['file_name'] = $filename;
	
			// load library upload
			$this->load->library('upload', $config);
	
			$this->upload->initialize($config);
			
			if($_FILES['logo']['name'])
			{
				if ($this->upload->do_upload('logo'))
				{
					$uploadfotologo = $this->upload->data();
					$data = array(
					  'namafile' =>$uploadfotologo['file_name'],
					  'type' =>$uploadfotologo['file_type']
					  
					);
					$fotologo = $data['namafile'];
	
					$data = array(
						'logo' => $fotologo,
					);
		
					$this->Klub_model->update($lastid, $data);
				}
	
			}

			// Upload Struktur Pengurus
			$config['upload_path'] = './uploads/struktur_pengurus/';
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['overwrite'] = true;
			$filename = 'StrukturPengurus-'.$lastid;
			$config['file_name'] = $filename;
	
			// load library upload
			$this->load->library('upload', $config);
	
			$this->upload->initialize($config);
			
			if($_FILES['struktur_pengurus']['name'])
			{
				if ($this->upload->do_upload('struktur_pengurus'))
				{
					$uploadfotostrukturpengurus = $this->upload->data();
					$data = array(
					  'namafile' =>$uploadfotostrukturpengurus['file_name'],
					  'type' =>$uploadfotostrukturpengurus['file_type']
					  
					);
					$fotostrukturpengurus = $data['namafile'];
	
					$data = array(
						'struktur_pengurus' => $fotostrukturpengurus,
					);
		
					$this->Klub_model->update($lastid, $data);
				}
	
			}

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
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}

	public function proses_ubah_klub()
	{
		$this->_rules();
		if($this->form_validation->run() == FALSE) {
			$id_klub = $this->input->post('id_klub');
			$this->ubah_klub($id_klub);
		} else {
			$id_klub = $this->input->post('id_klub');
			$logo = $this->input->post('logo');
			$struktur_pengurus = $this->input->post('struktur_pengurus');
			$data = array(
				'nama_klub' => $this->input->post('nama_klub'),
				'pengurus' => $this->input->post('pengurus'),
			);

			// Logo
			if ($logo == NULL || $logo == "") {
				$config['upload_path'] = './uploads/logo/';
				$config['allowed_types'] = 'jpg|jpeg|png';
				$config['overwrite'] = true;
				$filename = 'Logo-'.$id_klub;
				$config['file_name'] = $filename;
	
				// load library upload
				$this->load->library('upload', $config);
		
				$this->upload->initialize($config);
				
				if($_FILES['logo']['name'])
				{
					if ($this->upload->do_upload('logo'))
					{
						$uploadfotologo = $this->upload->data();
						$data = array(
						'namafile' =>$uploadfotologo['file_name'],
						'type' =>$uploadfotologo['file_type']
						
						);
						$fotologo = $data['namafile'];

						$id_klub = $this->input->post('id_klub');
		
						$data = array(
							'logo' => $fotologo,
						);
			
						$this->Klub_model->update($id_klub, $data);
					}
		
				}
			}

			// Struktur Pengurus
			if ($struktur_pengurus == NULL || $struktur_pengurus == "") {
				$config['upload_path'] = './uploads/struktur_pengurus/';
				$config['allowed_types'] = 'jpg|jpeg|png';
				$config['overwrite'] = true;
				$filename = 'StrukturPengurus-'.$id_klub;
				$config['file_name'] = $filename;
	
				// load library upload
				$this->load->library('upload', $config);
		
				$this->upload->initialize($config);
				
				if($_FILES['struktur_pengurus']['name'])
				{
					if ($this->upload->do_upload('struktur_pengurus'))
					{
						$uploadfotostrukturpengurus = $this->upload->data();
						$data = array(
						'namafile' =>$uploadfotostrukturpengurus['file_name'],
						'type' =>$uploadfotostrukturpengurus['file_type']
						
						);
						$fotostrukturpengurus = $data['namafile'];

						$id_klub = $this->input->post('id_klub');
		
						$data = array(
							'struktur_pengurus' => $fotostrukturpengurus,
						);
			
						$this->Klub_model->update($id_klub, $data);
					}
		
				}
			}

			$this->Klub_model->update($id_klub, $data);
			redirect(site_url('Klub'));
		}
	}

	public function resetlogo($id_klub)
	{
		$this->Klub_model->reset_logo($id_klub);
		redirect(site_url('Klub/ubah_klub/'.$id_klub));
	}

	public function resetstruktur($id_klub)
	{
		$this->Klub_model->reset_struktur($id_klub);
		redirect(site_url('Klub/ubah_klub/'.$id_klub));
	}
}