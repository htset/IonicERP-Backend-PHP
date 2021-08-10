<?php
class Price extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
		$this->load->database(); 
	}
	
	function getDefaultPrice($productId)
	{
		$this->db->where('ProductId', $productId);
		$this->db->where('CompanyId', 0);
		$this->db->where('FinishDate', NULL);
		$this->db->where('LowerLimitQuantity', 0);
		$this->db->where('UpperLimitiQuantity', NULL);
		$query = $this->db->get('ProductPrices');
		return $query->row();
	}

	function getPrices($productId)
	{
		$sql = "select * 
						from ProductPrices p left outer join Companies c on p.companyId = c.id 
						where productId = ".$productId." and FinishDate is NULL";
		$results = $this->db->query($sql);
		//echo $sql;
		return $results->result();
	}
	
}

?>