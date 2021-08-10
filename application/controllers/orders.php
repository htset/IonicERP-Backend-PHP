<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Orders extends CI_Controller {
 
	var $rows_per_page = 10;
	
 	public function __construct()
	{
		parent::__construct();
		$this->load->model('order');
		$this->load->model('orderDetail');
		$this->load->helper('url');
	}

	public function index()
	{
		$page_num = $this->uri->segment(3);
		$search = trim($this->input->get("search"));

		if(empty($page_num))
			$page_num = 1;
		
		$orders = $this->order->search($this->rows_per_page, $page_num, $search);
		$data['orders'] = $orders;
		$this->load->view('orders/index', $data);
	}

	
	public function view()
	{
		$id = trim($this->uri->segment(2));
		$order = $this->order->get_entry($id);
		$orderDetails = $this->orderDetail->getByOrderId($order->Id);
		
		$data['order'] = $order;
		$data['orderDetails'] = $orderDetails;
		$this->load->view('orders/view', $data);	
	}	
	
	public function combinedQuery()
	{
		$suppliers = $this->uri->segment(3);
		$customers = $this->uri->segment(4);
		$transporters = $this->uri->segment(5);
		$startDate = $this->uri->segment(6);
		$endDate = $this->uri->segment(7);
		$page_num = $this->uri->segment(8);

		$orders = $this->order->searchCombined($this->rows_per_page, $page_num, $suppliers, $customers, $transporters, $startDate, $endDate);
		$data['orders'] = $orders;
		$this->load->view('orders/index', $data);
	}
		
}

