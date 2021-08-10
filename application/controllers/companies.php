<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Companies extends CI_Controller {

	var $rows_per_page = 10;
 
 	public function __construct()
	{
		parent::__construct();
		$this->load->model('company');
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
		
		$companies = $this->company->search($this->rows_per_page, $page_num, $search);
		$data['companies'] = $companies;
		$this->load->view('companies/index', $data);
	}
	
	public function suppliers()
	{
		$companies = $this->company->get_by_type('SPL');
		$data['companies'] = $companies;
		$this->load->view('companies/index', $data);
	}
	
	public function customers()
	{
		$companies = $this->company->get_by_type('CST');
		$data['companies'] = $companies;
		$this->load->view('companies/index', $data);
	}

	public function transporters()
	{
		$companies = $this->company->get_by_type('TRN');
		$data['companies'] = $companies;
		$this->load->view('companies/index', $data);
	}

	public function get_all_json()
	{
		$companies = $this->company->get_all();
		$data['companies'] = $companies;
		$this->load->view('companies/index', $data);	
	}	
	
	public function view()
	{
		$id = trim($this->uri->segment(2));
		$company = $this->company->get_entry($id);
		$defaultAddress = $this->address->get_by_company_id($company->DefaultAdrress);
		$contacts = $this->contact->getContacts($id);
		
		$data['company'] = $company;
		$data['defaultAddress'] = $defaultAddress;
		$data['contacts'] = $contacts;
		$this->load->view('companies/view', $data);	
	}	

	public function combinedQuery()
	{
		$companyTypes = $this->uri->segment(3);
		$countries = $this->uri->segment(4);
		$active = $this->uri->segment(5);
		$page_num = $this->uri->segment(6);

		$companies = $this->company->searchCombined($this->rows_per_page, $page_num, $companyTypes, $countries, $active);
		$data['companies'] = $companies;
		$this->load->view('companies/index', $data);
	}
	
}

