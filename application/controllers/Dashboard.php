<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if(null == $this->session->userdata('uid')) {
			header("Location: ".site_url()."");
		}
		$this->output->delete_cache();
	}

	public function index() {
		$data['menu'] = $this->load->view('menu', NULL, TRUE);
          $this->load->view('header');
          $this->load->view('dashboard', $data);
          $this->load->view('footer');
	}
}
