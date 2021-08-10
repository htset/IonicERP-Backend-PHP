<?php
class Address extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
		$this->load->database(); 
	}
	
	function get_by_company_id($id)
	{
		$this->db->where('ParentId', $id);
		$query = $this->db->get('Adrresses');
		return $query->row();
	}

	function get_by_contact_id($id)
	{
		$this->db->where('ParentId', $id);
		$query = $this->db->get('Adrresses');
		return $query->row();
	}
	
}

?>