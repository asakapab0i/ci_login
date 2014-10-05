<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function login(){
		if ($this->input->post()) {
			$query = $this->db->select('*')->from('accounts')->where($this->input->post())->get();

			if ($query->num_rows() == 1) {
				$this->session->set_userdata('login',$query->result_array());
				return TRUE;
			}else{
				return FALSE;
			}
		}
	}

	public function register(){
		if ($this->input->post()) {
			$data = $this->input->post();
			unset($data['cpassword']);
			if ($this->db->insert('accounts',$data)) {
				return TRUE;
			}
		}
	}

	public function profile(){
		if ($data = $this->session->userdata('login')) {
			$query = $this->db->select('*')->from('accounts')->where('user_id', $data[0]['user_id'])->where('password', $data[0]['password'])->get();
			return $query->result_array();
		}
	}

}

/* End of file account.php */
/* Location: ./application/models/account.php */