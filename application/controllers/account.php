<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('account_model');
	}

	public function index(){
		$this->login();
	}

	public function login(){
		$data['head'] = 'Login';
		$data['title'] = 'Account Login';
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->input->post()){
			if ($this->form_validation->run() == FALSE) {
				$this->parser->parse('account/login', $data);
			}else{
				$resp = $this->account_model->login();
				if ($resp != FALSE) {
					redirect('account/profile');
				}else{
					redirect('account');
				}
			}
		}else{
			$this->parser->parse('account/login', $data);
		}
	}

	public function logout(){
		if ($this->session->userdata('login')) {
			$this->session->sess_destroy('login');
		}
		redirect('home');
	}

	public function register(){
		$data['head'] = 'Register';
		$data['title'] = 'Account Register';

		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[accounts.username]');
		$this->form_validation->set_rules('password', 'Password', 'required|matches[cpassword]');
		$this->form_validation->set_rules('cpassword', 'Password Confirmation', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[accounts.email]');


		if ($this->form_validation->run() == FALSE) {
			$this->parser->parse('account/register', $data);
		}else{
			$this->account_model->register();
			redirect('account/login');
		}
	}

	public function profile(){
		if($resp = $this->account_model->profile()){
			$resp = $resp[0];
			$resp['head'] = 'Profile';
			$resp['title'] = 'Account Profile';
			$this->parser->parse('account/profile', $resp);
		}else{
			redirect('account/home');
		}
	}
	
}

/* End of file account.php */
/* Location: ./application/controllers/account.php */