<?php
class Payroll_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	/* Create payslip */
	public function create_payslip() {
          $entries = $this->input->post();
          $date = $entries['p-date'];
          $success = 0;
          foreach ($entries as $key => $value) {
               $entry_id = substr($key, 4, 2);
               $entry_type = substr($key, 0, 3);
               $data = array(
                    'entry_id' => $entry_id,
                    'date' => $date,
                    'amount' => $value
               );
               if ($entry_type == 'pee' && $value != 0) {
                    $query = $this->db->insert('payrol_payslip_earnings', $data);
               } else if ($entry_type == 'ped' && $value != 0) {
                    $query = $this->db->insert('payrol_payslip_deductions', $data);
               }
          }
          header("Location: ".site_url('Payroll/index')."");

     }
}
