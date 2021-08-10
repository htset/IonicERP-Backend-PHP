<?php
class Country extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
		$this->load->database(); 
	}
	
	function get_all()
	{
		$this->db->distinct();
		$this->db->order_by("country", "asc"); 
		$this->db->select('country');
		$query = $this->db->get('adrresses');
		return $query->result();
	}
	
	
}

?>