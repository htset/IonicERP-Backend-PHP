<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {

	var $rows_per_page = 10;
 
 	public function __construct()
	{
		parent::__construct();
		$this->load->model('product');
		$this->load->model('price');
		$this->load->model('company');
		$this->load->model('commission');
		$this->load->model('quantity');
		$this->load->model('discount');
		$this->load->helper('url');
	}

	public function index()
	{
		$page_num = $this->uri->segment(3);
		$search = trim($this->input->get("search"));

		if(empty($page_num))
			$page_num = 1;
		
		$products = $this->product->search($this->rows_per_page, $page_num, $search);
		$data['products'] = $products;
		$this->load->view('products/index', $data);
	}
	
	public function get_all_json()
	{
		$products = $this->product->get_all();
		$data['products'] = $products;
		$this->load->view('products/index', $data);	
	}	
	
	public function view()
	{
		$id = trim($this->uri->segment(2));
		$product = $this->product->get_entry($id);
		$defaultPrice = $this->price->getDefaultPrice($id);
		$prices = $this->price->getPrices($id);
		$supplier = $this->company->get_entry($product->CompanyId);
		$commissions = $this->commission->getCommissions($id);
		$quantities = $this->quantity->getQuantities($id);
		$defaultQuantity = $this->quantity->getDefaultQuantity($id);
		$discounts = $this->discount->getDiscounts($id);
		
		$data['product'] = $product;
		$data['defaultPrice'] = $defaultPrice;
		$data['prices'] = $prices;
		$data['supplier'] = $supplier;
		$data['commissions'] = $commissions;
		$data['quantities'] = $quantities;
		$data['defaultQuantity'] = $defaultQuantity;
		$data['discounts'] = $discounts;
		
		$this->load->view('products/view', $data);	
	}	

	public function combinedQuery()
	{
		$suppliers = $this->uri->segment(3);
		$categories = $this->uri->segment(4);
		$subcategories = $this->uri->segment(5);
		$page_num = $this->uri->segment(6);

		$products = $this->product->searchCombined($this->rows_per_page, $page_num, $suppliers, $categories, $subcategories);
		$data['products'] = $products;
		$this->load->view('products/index', $data);
	}
	
}

