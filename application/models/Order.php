<?php
class Order extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
		$this->load->database(); 
	}
	
	function get_all()
	{
		$this->db->order_by("id", "asc"); 
		$query = $this->db->get('orders');
		return $query->result();
	}
	
	function get_entry($id)
	{
		$sql = "select c.*, a.BrandName SupplierName, b.BrandName CustomerName, t.BrandName TransporterName, s.StateName StateName 
								from Orders c, Companies a, Companies b, Companies t, States s 
								where c.supplierId = a.Id 
									and c.customerId = b.Id 
									and c.transporterId = t.id
									and c.stateId = s.id
									and c.Id = ".$id;
		
		//echo '<br/>'.$sql;
		$results = $this->db->query($sql);
		return $results->row();
	}

	function searchCombined($num_of_rows, $page, $suppliers, $customers, $transporters, $startDate, $endDate)
	{
		$whereStr = '';
		$where = array('', '', '');
		
		if(!empty($suppliers))
		{
			$tmpSuppliers = explode('-', $suppliers);
			$where[0] = "  c.supplierId in (";
			foreach($tmpSuppliers as $tt)
			{
				$where[0] .= "'".$tt."', ";
			}
			$where[0] = substr($where[0], 0, strlen($where[0]) -2);
			$where[0] .= ') ';
		}

		if(!empty($customers))
		{
			$tmpCustomers = explode('-', $customers);
			$where[1] = "  c.customerId in (";
			foreach($tmpCustomers as $tt)
			{
				$where[1] .= "'".$tt."', ";
			}
			$where[1] = substr($where[1], 0, strlen($where[1]) -2);
			$where[1] .= ') ';
		}

		if(!empty($transporters))
		{
			$tmpTransporters = explode('-', $customers);
			$where[2] = "  c.TransporterId in (";
			foreach($tmpTransporters as $tt)
			{
				$where[2] .= "'".$tt."', ";
			}
			$where[2] = substr($where[2], 0, strlen($where[2]) -2);
			$where[2] .= ') ';
		}
		
		if(!empty($startDate))
		{
			$where[3] = "  (c.OrderDate >= '".$startDate."') ";
		}

		if(!empty($endDate))
		{
			$where[4] = "  (c.OrderDate <= '".$endDate."') ";
		}

		foreach($where as $item)
		{
			if(!empty($item))
				$whereStr .= " AND ".$item." ";
		}
			
		//echo $whereStr;
		
		//works with SQL server
		$sql = "select top ".$num_of_rows." * from 
							(select c.*, a.BrandName SupplierName, b.BrandName CustomerName, ROW_NUMBER() over (order by c.id) as Result_Number 
								from Orders c, Companies a, Companies b, Companies t where c.supplierId = a.Id and c.customerId = b.Id  and c.transporterId = t.id ".$whereStr.") innerSel 
							Where Result_Number >((".$page." - 1) *".$num_of_rows.") Order by Result_Number";
		
		//echo '<br/>'.$sql;
		$results = $this->db->query($sql);
		return $results->result();
	}	
		
}

?>