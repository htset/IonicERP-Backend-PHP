<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categories extends CI_Controller {
 
 	public function __construct()
	{
		parent::__construct();
		$this->load->model('category');
		$this->load->helper('url');
	}

	public function index()
	{
		$categories = $this->category->get_all();
		$data['categories'] = $categories;
		$this->load->view('categories/index', $data);
	}
	
	public function view()
	{
		$id = trim($this->uri->segment(2));
		$category = $this->category->get_entry($id);
		
		$data['category'] = $category;
		$this->load->view('categories/view', $data);	
	}	
	
}

