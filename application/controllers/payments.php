<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payments extends CI_Controller {
 
	var $rows_per_page = 10;
	
 	public function __construct()
	{
		parent::__construct();
		$this->load->model('payment');
		$this->load->helper('url');
	}

	public function index()
	{
		$page_num = $this->uri->segment(3);
		$search = trim($this->input->get("search"));

		if(empty($page_num))
			$page_num = 1;
		
		$payments = $this->payment->search($this->rows_per_page, $page_num, $search);
		$data['payments'] = $payments;
		$this->load->view('payments/index', $data);
	}

	
	public function view()
	{
		$id = trim($this->uri->segment(2));
		$payment = $this->payment->get_entry($id);
		
		$data['payment'] = $payment;
		$this->load->view('payments/view', $data);	
	}	
	
	public function combinedQuery()
	{
		$suppliers = $this->uri->segment(3);
		$customers = $this->uri->segment(4);
		$transporters = $this->uri->segment(5);
		$page_num = $this->uri->segment(6);

		$payments = $this->payment->searchCombined($this->rows_per_page, $page_num, $suppliers, $customers, $transporters);
		$data['payments'] = $payments;
		$this->load->view('payments/index', $data);
	}
		
}

