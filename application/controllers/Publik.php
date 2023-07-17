<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publik extends CI_Controller {

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
		$this->load->model('Pemain_model');
		$this->load->model('Berita_model');
	}

	public function index()
	{
		$data = array(
			'berita' => $this->Berita_model->get_berita_baru(4)
		);

		$this->load->view('header');
		$this->load->view('publik/konten_depan', $data);
		$this->load->view('footer');
	}

	public function pemain($id_klub)
	{
		$data = array(
			'data_pemain' =>$this->Pemain_model->get_all_pemain_by_klub($id_klub),
		);

		$this->load->view('header');
		$this->load->view('publik/pemain', $data);
		$this->load->view('footer');
	}

	public function klub()
	{
		$data = array(
			'data_klub' =>$this->Klub_model->get_all_klub(),
		);

		$this->load->view('header');
		$this->load->view('publik/klub', $data);
		$this->load->view('footer');
	}

	public function tentang()
	{
		$this->load->view('header');
		$this->load->view('publik/about');
		$this->load->view('footer');
	}

	public function berita($slug = NULL)
	{
		if($slug) {

			$data = array(
				'berita' =>$this->Berita_model->get_berita_slug($slug),
			);

			$this->load->view('header');
			$this->load->view('publik/detail_berita', $data);
			$this->load->view('footer');

		} else {

			$data = array(
				'data_berita' =>$this->Berita_model->get_all_berita(),
			);

			$this->load->view('header');
			$this->load->view('publik/berita', $data);
			$this->load->view('footer');

		}
	}

}