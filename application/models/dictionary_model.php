<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dictionary_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function lists($limit = 20){
		$query = $this->db->select('*')
		->from('words')
		->join('definitions', 'words.definition_id = definitions.definition_id', 'LEFT')
		->join('accounts', 'words.account_id= accounts.user_id', 'LEFT')
		->limit($limit)
		->get();
		return $query;
	}

	public function detail($id){
		$query = $this->db->select('*')
		->from('words')
		->join('definitions', 'words.definition_id = definitions.definition_id', 'LEFT')
		->join('accounts', 'words.account_id= accounts.user_id', 'LEFT')
		->where('word_id', $id)
		->get();
		return $query;

		if ($query->num_rows() == 1) {
			return $query;
		}else{
			return FALSE;
		}
	}

	public function add(){
		if ($post = $this->input->post()) {
			//no user?
			$password = substr(md5(rand(1,999)), 0, 6);
			$acc = $this->db->select('user_id')->from('accounts')->where('email', $post['email'])->get();

			if ($acc->num_rows() > 0) {
				$account = $acc->result_array();
				$account_id = $account[0]['user_id'];
			}else{
				$account_id = $this->db->insert('accounts', 
					array('email' => $post['email'],
						'password' => $password,
						));
			}

			$definition_id = $this->db->insert('definitions', array('definition' => $post['definition'], 'definition_example' => $post['example']));
			$this->db->insert('words',array('definition_id' => $definition_id,'word' => $post['word'],'account_id' => $account_id));
			return TRUE;
		}
	}

	public function delete($id){
		if($this->db->delete('words', array('word_id', $id))){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function edit($id){
		if ($this->db->update('words', array('word_id' => $id))) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function get_object_dictionary($id){
		$query = $this->db->select('*')->from('words')->where('word_id', $id);
		return $query;
	}
}

/* End of file dictionary_model.php */
/* Location: ./application/models/dictionary_model.php */