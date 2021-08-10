<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contacts extends CI_Controller {

	var $rows_per_page = 10;
 
 	public function __construct()
	{
		parent::__construct();
		$this->load->model('contact');
		$this->load->model('address');
		$this->load->helper('url');
	}

	public function index()
	{
		$page_num = $this->uri->segment(3);
		$search = trim($this->input->get("search"));

		if(empty($page_num))
			$page_num = 1;
		
		$contacts = $this->contact->search($this->rows_per_page, $page_num, $search);
		$data['contacts'] = $contacts;
		$this->load->view('contacts/index', $data);
	}
	
	public function get_all_json()
	{
		$contacts = $this->contact->get_all();
		$data['contacts'] = $contacts;
		$this->load->view('contacts/index', $data);	
	}	
	
	public function view()
	{
		$id = trim($this->uri->segment(2));
		$contact = $this->contact->get_entry($id);
		$defaultAddress = $this->address->get_by_contact_id($contact->DefaultAdrress);
		
		$data['contact'] = $contact;
		$data['defaultAddress'] = $defaultAddress;
		$this->load->view('contacts/view', $data);	
	}	

	public function combinedQuery()
	{
		$countries = $this->uri->segment(3);
		$active = $this->uri->segment(4);
		$page_num = $this->uri->segment(5);

		$contacts = $this->contact->searchCombined($this->rows_per_page, $page_num, $countries, $active);
		$data['contacts'] = $contacts;
		$this->load->view('contacts/index', $data);
	}
	
}

