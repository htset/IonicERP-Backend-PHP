<?php
class Category extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
		$this->load->database(); 
	}
	
	function get_all()
	{
		$this->db->order_by("id", "asc"); 
		$query = $this->db->get('productCategories');
		return $query->result();
	}
	
	function get_entry($id)
	{
		$this->db->where('Id', $id);
		$query = $this->db->get('productCategories');
		return $query->row();
	}
	
}

?>