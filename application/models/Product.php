<?php
class Product extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
		$this->load->database(); 
	}
	
	function get_all()
	{
		$this->db->order_by("id", "desc"); 
		$query = $this->db->get('products');
		return $query->result();
	}
	
	function get_entry($id)
	{
		$sql = "
			select p.Id as Id
					,p.CategoryId
					,CompanyId
					,ProductName
					,ProductEnglishName
					,ProductCode
					,ProductComments
					,ProductPicture
					,ProductActive
					,SmallerQuantity
					,p.Weight
					,GrossWeight
					,Multitude
					,ProductDescriptionEnglish
					,ProductDescriptionGerman
					,ProductDescriptionLang1
					,ProductDescriptionLang2
					,SubcategoryId
					,ProductDescriptionGreek
					,ProductDescriptionGermanReal
					,ProductNew
					,ProductBio
					,SupplierWebName
					,ProductWebsiteActive
					,ProductCategoryName
					,s.Name as ProductSubcategoryName  
			from Products p, ProductCategories c, ProductSubcategories s
			where p.CategoryId = c.id  and p.SubcategoryId = s.id and p.id = ".$id;

			//echo '<br/>'.$sql;
		$results = $this->db->query($sql);
		return $results->row();

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
	
	function searchCombined($num_of_rows, $page, $suppliers, $categories, $subcategories)
	{
		$whereStr = '';
		$where = array('', '', '');
		
		if(!empty($suppliers))
		{
			$suppliers = str_replace("-", ",", $suppliers);
			$where[0] = "  CompanyId in (".$suppliers.") ";
		}

		if(!empty($categories))
		{
			$categories = str_replace("-", ",", $categories);
			$where[1] = " CategoryId in (".$categories.") ";
		}
		
		if(!empty($subcategories))
		{
			$subcategories = str_replace("-", ",", $subcategories);
			$where[2] = " SubcategoryId in (".$subcategories.") ";
		}
		
		$firstFilled = false;
		foreach($where as $item)
		{
			if(!empty($item) && !$firstFilled)
			{
				$whereStr = " AND ".$item." ";
				$firstFilled = true;
			}
			else if(!empty($item) && $firstFilled)
				$whereStr .= " AND ".$item." ";
		}
			
		//echo $whereStr;
		
		//works with SQL server
/*		$sql = "select top ".$num_of_rows." * from 
							(select *, ROW_NUMBER() over (order by id) as Result_Number from Products ".$whereStr.") innerSel 
							Where Result_Number >((".$page." - 1) *".$num_of_rows.") Order by Result_Number";
*/		
		$sql = "
select top ".$num_of_rows." * from 
(
	select p.Id as Id
      ,p.CategoryId
      ,CompanyId
      ,ProductName
      ,ProductEnglishName
      ,ProductCode
      ,ProductComments
      ,ProductPicture
      ,ProductActive
      ,SmallerQuantity
      ,p.Weight
      ,GrossWeight
      ,Multitude
      ,ProductDescriptionEnglish
      ,ProductDescriptionGerman
      ,ProductDescriptionLang1
      ,ProductDescriptionLang2
      ,SubcategoryId
      ,ProductDescriptionGreek
      ,ProductDescriptionGermanReal
      ,ProductNew
      ,ProductBio
      ,SupplierWebName
      ,ProductWebsiteActive
      ,ProductCategoryName
      ,s.Name as ProductSubcategoryName 
      ,ROW_NUMBER() over (order by p.id) as Result_Number 
	from Products p, ProductCategories c, ProductSubcategories s
	where p.CategoryId = c.id  and p.SubcategoryId = s.id
	".$whereStr."
) innerSel 
Where Result_Number >((".$page." - 1) *".$num_of_rows.") Order by Result_Number
			";
		//echo '<br/>'.$sql;
		$results = $this->db->query($sql);
		return $results->result();
	}	
	
}

?>