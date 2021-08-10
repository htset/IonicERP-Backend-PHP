<?php
class Company extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
		$this->load->database(); 
	}
	
	function get_all()
	{
		$this->db->order_by("id", "desc"); 
		$query = $this->db->get('companies');
		return $query->result();
	}

	function get_by_type($type)
	{
		$this->db->order_by("id", "asc"); 
		$this->db->where('companyType', $type);
		$query = $this->db->get('companies');
		return $query->result();
	}
	
	function get_entry($id)
	{
		$this->db->where('Id', $id);
		$query = $this->db->get('companies');
		return $query->row();
	}

/*
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
*/	
	function searchCombined($num_of_rows, $page, $companyTypes, $countries, $active)
	{
		$whereStr = '';
		$where = array('', '', '');
		
		
		if(!empty($companyTypes))
		{
			$tmpTypes = explode('-', $companyTypes);
			$where[0] = "  c.CompanyType in (";
			foreach($tmpTypes as $tt)
			{
				$where[0] .= "'".$tt."', ";
			}
			$where[0] = substr($where[0], 0, strlen($where[0]) -2);
			$where[0] .= ') ';
		}

		if(!empty($countries))
		{
			$tmpCountries = explode('-', $countries);
			$where[1] = "  a.Country in (";
			foreach($tmpCountries as $tt)
			{
				$where[1] .= "'".$tt."', ";
			}
			$where[1] = substr($where[1], 0, strlen($where[1]) -2);
			$where[1] .= ') ';
		}

		if(!empty($active))
		{
			$active = str_replace("-", ",", $active);
			$active = str_replace("I", "0", $active);
			$active = str_replace("A", "1", $active);
			$where[2] = " c.CompanyActive in (".$active.") ";
		}
		
		foreach($where as $item)
		{
			if(!empty($item))
				$whereStr .= " AND ".$item." ";
		}
			
		//echo $whereStr;
		
		//works with SQL server
		$sql = "select top ".$num_of_rows." * from 
							(select c.Id, c.BrandName, c.CompanyName, c.CompanyActive, a.country, ROW_NUMBER() over (order by c.id) as Result_Number from Companies c, Adrresses a where c.DefaultAdrress = a.Id ".$whereStr.") innerSel 
							Where Result_Number >((".$page." - 1) *".$num_of_rows.") Order by Result_Number";
		
		//echo '<br/>'.$sql;
		$results = $this->db->query($sql);
		return $results->result();
	}	
	
}

?>