<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function testingbeda()
	{
		$this->load->view('Insan/tampilan');
  	}
	
	public function tampil_beda()
	{
		$this->load->view('Insan/tampilan');
		$this->load->view('fikar/tampilan');
	}

}