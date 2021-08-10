<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subcategories extends CI_Controller {
 
 	public function __construct()
	{
		parent::__construct();
		$this->load->model('subcategory');
		$this->load->helper('url');
	}

	public function index()
	{
		$subcategories = $this->subcategory->get_all();
		$data['subcategories'] = $subcategories;
		$this->load->view('subcategories/index', $data);
	}
	
	public function view()
	{
		$id = trim($this->uri->segment(2));
		$subcategory = $this->subcategory->get_entry($id);
		
		$data['subcategory'] = $subcategory;
		$this->load->view('subcategories/view', $data);	
	}	
	
}

