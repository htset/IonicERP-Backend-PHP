<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Countries extends CI_Controller {
 
 	public function __construct()
	{
		parent::__construct();
		$this->load->model('country');
		$this->load->helper('url');
	}

	public function index()
	{
		$countries = $this->country->get_all();
		$data['countries'] = $countries;
		$this->load->view('countries/index', $data);
	}
	
}

