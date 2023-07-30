<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

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
			'menu_wasit' => '',
			'menu_berita' => 'active',
			'data_berita' =>$this->Berita_model->get_all_berita(),

		);

		$this->template->load('template/template_admin', 'berita/berita_list', $data);
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
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
			'menu_wasit' => '',
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
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('tanggal','Tanggal','trim|required');
		$this->form_validation->set_rules('judul','Judul','trim|required');
		$this->form_validation->set_rules('isi','Isi Berita','trim|required');
	}

	public function proses_tambah_berita()
	{
		function slugify($txt) {
			// replace non letter or digits by -
			$txt = preg_replace('~[^\pL\d]+~u', '-', $txt);
		   
			// transliterate
			$txt = iconv('utf-8', 'us-ascii//TRANSLIT', $txt);
		   
			// remove unwanted characters
			$txt = preg_replace('~[^-\w]+~', '', $txt);
		   
			// trim
			$txt = trim($txt, '-');
		   
			// remove duplicate -
			$txt = preg_replace('~-+~', '-', $txt);
		   
			// lowercase
			$isi = strtolower($txt);
			 
		  return $isi;
		  }
		  
		$this->_rules();
		if($this->form_validation->run() == FALSE) {
			$this->tambah_berita();
		} else {
			$isi_slug = $this->input->post('judul');
			$data = array(
			'tanggal' => $this->input->post('tanggal'),
			'judul' => $this->input->post('judul'),
			'isi' => $this->input->post('isi'),
			'slug' => slugify($isi_slug),
			);

			$this->Berita_model->insert($data);
			$id_berita = $this->input->post('id_berita');

			$lastid = $this->Berita_model->inqlastid()->lastid;

			// setting konfigurasi upload
			$config['upload_path'] = './uploads/fotoberita/';
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['overwrite'] = true;
			$filename = 'FotoBerita-'.$lastid;
			$config['file_name'] = $filename;
	
			// load library upload
			$this->load->library('upload', $config);
	
			$this->upload->initialize($config);
			
			if($_FILES['foto_berita']['name'])
			{
				if ($this->upload->do_upload('foto_berita'))
				{
					$uploadfotoberita = $this->upload->data();
					$data = array(
					  'namafile' =>$uploadfotoberita['file_name'],
					  'type' =>$uploadfotoberita['file_type']
					  
					);
					$fotoberita = $data['namafile'];

					$id_berita = $this->input->post('id_berita');
	
					$data = array(
						'foto' => $fotoberita,
					);
		
					$this->Berita_model->update($lastid, $data);
				}
	
			}
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
			'menu_wasit' => '',
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
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}

	public function proses_ubah_berita()
	{
		$this->_rules();
		if($this->form_validation->run() == FALSE) {
			$id_berita = $this->input->post('id_berita');
			$this->ubah_berita($id_berita);
		} else {
			$id_berita = $this->input->post('id_berita');
			$foto_berita = $this->input->post('foto_berita');
			$data = array(
				'tanggal' => $this->input->post('tanggal'),
				'judul' => $this->input->post('judul'),
				'isi' => $this->input->post('isi'),
			);

			if ($foto_berita == NULL || $foto_berita == "") {
				$config['upload_path'] = './uploads/fotoberita/';
				$config['allowed_types'] = 'jpg|jpeg|png';
				$config['overwrite'] = true;
				$filename = 'FotoBerita-'.$id_berita;
				$config['file_name'] = $filename;
	
				// load library upload
				$this->load->library('upload', $config);
		
				$this->upload->initialize($config);
				
				if($_FILES['foto_berita']['name'])
				{
					if ($this->upload->do_upload('foto_berita'))
					{
						$uploadfotoberita = $this->upload->data();
						$data = array(
						'namafile' =>$uploadfotoberita['file_name'],
						'type' =>$uploadfotoberita['file_type']
						
						);
						$fotoberita = $data['namafile'];

						$id_berita = $this->input->post('id_berita');
		
						$data = array(
							'foto' => $fotoberita,
						);
			
						$this->Berita_model->update($id_berita, $data);
					}
		
				}
			}

			$this->Berita_model->update($id_berita, $data);
			redirect(site_url('Berita'));
		}

		
		
	}

	public function resetfoto($id_berita)
	{
		$this->Berita_model->reset_foto($id_berita);
		redirect(site_url('Berita/ubah_berita/'.$id_berita));
	}
	
}