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
		$data['payrol_entries_earnings'] = $this->db->get('payrol_entries_earnings')->result_array();
		$data['payrol_entries_deductions'] = $this->db->get('payrol_entries_deductions')->result_array();

          $this->load->view('header');
          $this->load->view('dashboard/index', $data);
		$this->load->view('navbar');
          $this->load->view('footer');
	}

}
