<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * CodeIgniter Form Validation Extension
 */
class MY_Form_validation extends CI_Form_validation {

	function date_check($datum)
    {
			$ed = DateTime::createFromFormat('d/m/Y H:i', $datum); 
			
			if($ed != FALSE)
				return TRUE;
			else
			{
				$this->CI->form_validation->set_message('date_check', 'Η ημέρα και ώρα έναρξης δεν είναι σωστές! (Χρησιμοποιείστε το ημερολόγιο καλύτερα)');
				return FALSE;
			}				
    }
	
	function date_range_check($start_date_str)
    {
			//return true;
			$CI =& get_instance();
			$end_date_str = $CI->input->post('end_date');

			$sd = DateTime::createFromFormat('d/m/Y H:i', $start_date_str); 
			$ed = DateTime::createFromFormat('d/m/Y H:i', $end_date_str); 

			if($sd < $ed)
				return TRUE;
			else
			{
				$this->CI->form_validation->set_message('date_range_check', 'Η ημέρα και ώρα έναρξης είναι αργότερα από την ημέρα και ώρα λήξης του ραντεβού!');
				return FALSE;
			}
    }	
	
	function validate_phone_number($value) 
	{
		$value = trim($value);
		$match = '/^[-+0-9 ]{3,20}$/';
		//$match = '/^\(?[0-9]{3}\)?[-. ]?[0-9]{3}[-. ]?[0-9]{4}$/';
		//$replace = '/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/';
		//$return = '($1) $2-$3';
		if (preg_match($match, $value)) 
		{
			return TRUE;
			//return preg_replace($replace, $return, $value);
		} 
		else
		{
			$this->CI->form_validation->set_message('validate_phone_number', 'Το πεδίο Τηλέφωνο δεν είναι σωστό (Επιτρεπόμενοι χαρακτήρες: + και -).');
		}
	}	
}