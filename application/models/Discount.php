<?php
class Discount extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
		$this->load->database(); 
	}
	
	function getDefaultDiscount($productId)
	{
		$this->db->where('ProductId', $productId);
		$this->db->where('CompanyId', 0);
		$this->db->where('FinishDate', NULL);
		$this->db->where('LowerLimitQuantity', 0);
		$this->db->where('UpperLimitiQuantity', NULL);
		$query = $this->db->get('Discount');
		return $query->row();
	}

	function getDiscounts($productId)
	{
		$sql = "select * 
						from Discount p left outer join Companies c on p.companyId = c.id 
						where productId = ".$productId." and FinishDate is NULL";
		$results = $this->db->query($sql);
		//echo $sql;
		return $results->result();
	}

	
}

?>