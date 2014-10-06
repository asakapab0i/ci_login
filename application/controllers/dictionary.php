<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dictionary extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('dictionary_model');
	}

	public function index(){
		$data = $this->dictionary_model->lists();
		$this->parser->parse('dictionary/list', array('words' => $data->result_array(), 'title' => 'List of words'));
	}

	public function detail($id){
		if ($id > 0) {
			$data = $this->dictionary_model->detail($id);
			if ($data->num_rows() > 0) {
				$this->parser->parse('dictionary/detail', array('result_array' => $data->result_array(), 'title' => 'Detail View'));
			}else{
				redirect('dictionary');
			}
		}else{
			redirect('dictionary');
		}
	}

	public function add(){
		$data['head'] = 'Add word';
		$data['title'] = 'Add word';
		if ($this->input->post()) {
			$this->form_validation->set_rules('word', 'Word', 'required|is_unique[words.word]');
			$this->form_validation->set_rules('definition', 'Definition', 'required');
			$this->form_validation->set_rules('example', 'Example', 'required');
			$this->form_validation->set_rules('tags', 'Tags');

			if ($this->form_validation->run() == FALSE) {
				$this->parser->parse('dictionary/add', $data);
			}else{
				$resp = $this->dictionary_model->add();
				if ($resp == TRUE) {
					redirect('home');
				}
			}

		}else{
			$this->parser->parse('dictionary/add', $data);
		}
	}

	public function edit($id){
		if ($id > 0) {
			if ($this->input->post()) {
				$this->dictionary_model->edit($id);
			}else{
				$this->parser->parse('dictionary/edit');
			}
		}
	}

	public function delete($id){
		if (is_int($id) and $id > 0) {
			if ($this->input->post()) {
				$this->dictionary_model->delete($id);
			}
		}else{
			redirect('home');
		}
	}

	public function random(){
		$query = $this->dictionary_model->get_object_dictionary();
		do {
			$id = mt_rand(0, $query->num_rows());
			$data = $this->dictionary_model->detail($id);
		} while ($data == FALSE);

		//redirect("dictionary/$data['word_id']/$data['word_slug']");
	}

}

/* End of file dictionary.php */
/* Location: ./application/controllers/dictionary.php */