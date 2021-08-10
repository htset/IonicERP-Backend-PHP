<?php
class Quantity extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
		$this->load->database(); 
	}
	
	function getDefaultQuantity($productId)
	{
		$sql = "select * from quantities where productId = ".$productId." and Id = ParentId";
		$results = $this->db->query($sql);
		return $results->row();
	}

	function getQuantities($productId)
	{
		$sql = "select q1.Id, q1.ProductId, q1.RatioToParent, q2.QuantityName 
						from quantities q1, quantities q2 
						where q1.productId = ".$productId." and q1.ParentId = q2.Id and q1.id<>q1.ParentId and q1.RatioToParent <> 0";
		$results = $this->db->query($sql);
		return $results->result();
	}

	
}

?>