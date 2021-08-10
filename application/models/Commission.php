<?php
class Commission extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
		$this->load->database(); 
	}
	
	function getDefaultCommission($productId)
	{
		$this->db->where('ProductId', $productId);
		$this->db->where('CompanyId', 0);
		$this->db->where('FinishDate', NULL);
		$this->db->where('LowerLimitQuantity', 0);
		$this->db->where('UpperLimitiQuantity', NULL);
		$query = $this->db->get('Commissions');
		return $query->row();
	}

	function getCommissions($productId)
	{
		$sql = "select * 
						from Commissions p left outer join Companies c on p.companyId = c.id 
						where productId = ".$productId." and FinishDate is NULL";
		$results = $this->db->query($sql);
		//echo $sql;
		return $results->result();
	}

	function search($num_of_rows, $page, $search)
	{
		$where = '';
		if(!empty($search))
			$where = " WHERE ProductName like '%".$search."%' ";
		
		//works with SQL server
		$sql = "select top ".$num_of_rows." * from 
							(select *, ROW_NUMBER() over (order by id) as Result_Number from Products ".$where.") innerSel 
							Where Result_Number >((".$page." - 1) *".$num_of_rows.") Order by Result_Number";
		
		//echo '<br/>'.$sql;
		$results = $this->db->query($sql);
		return $results->result();
	}	
	
	
}

?>