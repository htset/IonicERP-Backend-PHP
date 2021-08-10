<?php
class OrderDetail extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
		$this->load->database(); 
	}
	
	function get_all()
	{
		$this->db->order_by("id", "asc"); 
		$query = $this->db->get('orderDetails');
		return $query->result();
	}
	
	function getByOrderId($orderid)
	{
		$sql = "select d.*, p.*, q1.RatioToParent, q2.QuantityName 
								from OrderDetails d, Products p, Quantities q1, Quantities q2
								where d.productId = p.Id 
									and d.productId = q1.productId
									and (d.ParentQuantityId = q1.Id or d.ParentQuantityId = q1.parentId)
									and q1.ParentId = q2.id
									and d.orderId = ".$orderid;
		
		//echo '<br/>'.$sql;
		$results = $this->db->query($sql);
		return $results->result();

	}

}

?>