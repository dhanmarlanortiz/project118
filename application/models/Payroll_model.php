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
                    $query = $this->db->insert('payroll_payslip_earnings', $data);
               } else if ($entry_type == 'ped' && $value != 0) {
                    $query = $this->db->insert('payroll_payslip_deductions', $data);
               }
          }
          header("Location: ".site_url('Payroll/index')."");

     }

     public function get_entries($type) {
          if($type == 'earnings') {
               $query = $this->db->get('payroll_entries_earnings');
          } else if($type == 'deductions') {
               $query = $this->db->get('payroll_entries_deductions');
          }
          return $query->result_array();
     }

     public function get_payslip($type, $entry_id, $year=null, $month=null, $day=null) {
          if($type == 'earnings') {
               $this->db->select('ppe.*, pee.*');
               $this->db->from('payroll_payslip_earnings ppe, payroll_entries_earnings pee');
               if(isset($date)) {
                    $this->db->where('ppe.date', $date);
               }
               if(null != $year) {
                    $this->db->where('YEAR(ppe.date)', $year);
               }
               if(null != $month) {
                    $this->db->where('MONTH(ppe.date)', $month);
               }
               if(null != $day) {
                    $this->db->where('DAY(ppe.date)', $day);
               }
               $this->db->where('pee.id = ppe.entry_id');
               $this->db->where('pee.id', $entry_id);
               $this->db->order_by('pee.name', 'DESC');
          } else if($type == 'deductions') {
               $this->db->select('ppd.*, ped.*');
               $this->db->from('payroll_payslip_deductions ppd, payroll_entries_deductions ped');
               if(isset($date)) {
                    $this->db->where('ppd.date', $date);
               }
               if(null != $year) {
                    $this->db->where('YEAR(ppd.date)', $year);
               }
               if(null != $month) {
                    $this->db->where('MONTH(ppd.date)', $month);
               }
               if(null != $day) {
                    $this->db->where('DAY(ppd.date)', $day);
               }
               $this->db->where('ped.id', $entry_id);

               $this->db->where('ped.id = ppd.entry_id');
               $this->db->order_by('ped.name', 'DESC');
          }
          $query = $this->db->get();
          return $query->result_array();
     }

     public function get_date() {
          $year = $this->input->get('year');
          $month = $this->input->get('month');

          if(null !== $year) {
               $query = $this->db->query('SELECT DISTINCT EXTRACT(YEAR FROM date) FROM payroll_payslip_earnings');
               $result = $query->result_array();
               foreach ($result as $key => $value) {
                    // echo $value['EXTRACT(YEAR FROM date)']."<br>";
               }
          }

          // $query = $this->db->select('date')->from('payroll_payslip_earnings')->get();
          // $result = $query->result_array();
          // foreach ($result as $key => $value) {
          //      $date = strtotime($value['date']);
          //      echo date('Y', $date)."<br>";
          // }
     }



}
