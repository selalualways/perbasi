<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nama_klub extends CI_Controller {

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

		redirect(site_url('Nama_klub'));
	
    }
}