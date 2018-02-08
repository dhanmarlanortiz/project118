<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payroll extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if(null == $this->session->userdata('uid')) {
			header("Location: ".site_url()."");
		}
		$this->load->model('Payroll_model');
		$this->output->delete_cache();
	}

	public function index() {
		$data['payroll_entries_earnings'] = $this->Payroll_model->get_entries('earnings');
		$data['payroll_entries_deductions'] = $this->Payroll_model->get_entries('deductions');
		$this->Payroll_model->get_date();

		/* New Payslip Form */
		$data['create_payslip'] =  form_open('Payroll/create_payslip', array('class' => 'create-payslip'));
		$data['create_payslip'] .= heading('Earnings', 4, 'class="pee-header"');
		$data['create_payslip'] .=
		form_label('Date', 'pee-date', array('id' => 'pee-date-label')).
		form_input(array(
			'name' => 'p-date',
			'type' => 'text',
			'id' => 'p-date',
			'class' => 'date',
			'required' => true,
			'placeholder' => 'YYYY-MM-DD'
		));
		foreach ($data['payroll_entries_earnings'] as $pee):
			$data['create_payslip'] .=
			form_label($pee['name'], 'pee-'.$pee['id'].'-input', array('id' => 'pee-'.$pee['id'].'-label')).
			form_input(array(
				'id' => 'pee-'.$pee['id'].'-input',
				'name' => 'pee-'.$pee['id'],
				'placeholder' => '0.00',
				'type' => 'number',
				'step' => '0.01'
			));
		endforeach;
		$data['create_payslip'] .= heading('Deductions', 4, 'class="ped-header"');
		foreach ($data['payroll_entries_deductions'] as $ped):
			$data['create_payslip'] .=
			form_label($ped['name'], 'ped-'.$ped['id'].'-input', array('id' => 'ped-'.$ped['id'].'-label')).
			form_input(array(
				'id' => 'ped-'.$ped['id'].'-input',
				'name' => 'ped-'.$ped['id'],
				'placeholder' => '0.00',
				'type' => 'number',
				'step' => '0.01'
			));
		endforeach;
		$data['create_payslip'] .=
		form_label('Submit', 'pee-submit', array('id' => 'p-submit-label')).
		form_input(array(
			'name' => 'p-submit',
			'value' => 'Submit',
			'type' => 'submit'
		));
		$data['create_payslip'] .= form_close();

          $data['menu'] = $this->load->view('menu', NULL, TRUE);
          $this->load->view('header');
          $this->load->view('payroll', $data);
          $this->load->view('footer');
	}

	public function create_payslip() {
		$data['create_user'] = $this->Payroll_model->create_payslip();
	}
}
