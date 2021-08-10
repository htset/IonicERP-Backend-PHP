<?php

$config = array(
	'appointment_validation' => array(
		   array(
				 'field'   => 'name',
				 'label'   => 'Όνομα',
				 'rules'   => 'trim|required|max_length[50]'
			  ),
		   array(
				 'field'   => 'surname',
				 'label'   => 'Επώνυμο',
				 'rules'   => 'trim|required|max_length[100]'
			  ),
		   array(
				 'field'   => 'start_date',
				 'label'   => 'Έναρξη',
				 'rules'   => 'trim|required|date_check|date_range_check'
				 //'rules'   => 'trim|required|date_check|date_range_check'
				 //'rules'   => 'trim|required'
			  ),   
		   array(
				 'field'   => 'end_date',
				 'label'   => 'Λήξη',
				 'rules'   => 'trim|required|date_check'
				 //'rules'   => 'trim|required|date_check'
				 //'rules'   => 'trim|required'
			  ), 
		   array(
				 'field'   => 'amka',
				 'label'   => 'ΑΜΚΑ',
				 'rules'   => 'trim|numeric|exact_length[11]'
			  ),   
		   array(
				 'field'   => 'telephone1',
				 'label'   => 'Τηλέφωνο 1',
				 'rules'   => 'trim|max_length[20]|validate_phone_number'
			  ),   
		   array(
				 'field'   => 'telephone2',
				 'label'   => 'Τηλέφωνο 2',
				 'rules'   => 'trim|max_length[20]|validate_phone_number'
			  ),		
		   array(
				 'field'   => 'new_user',
				 'label'   => 'Νέος χρήστης',
				 'rules'   => 'trim'
			  )		
		),
	'user_insert_validation' => array(
		   array(
				 'field'   => 'name',
				 'label'   => 'Όνομα',
				 'rules'   => 'trim|required|max_length[50]'
			  ),
		   array(
				 'field'   => 'surname',
				 'label'   => 'Επώνυμο',
				 'rules'   => 'trim|required|max_length[50]'
			  ),
		   array(
				 'field'   => 'username',
				 'label'   => 'Username',
				 'rules'   => 'trim|required|max_length[50]'
			  ),   
		   array(
				 'field'   => 'password',
				 'label'   => 'Password',
				 'rules'   => 'trim|required|max_length[50]'
			  ),   
		   array(
				 'field'   => 'level',
				 'label'   => 'Επίπεδο',
				 'rules'   => 'trim|required'
			  )		
		)	,
	'user_update_validation' => array(
		   array(
				 'field'   => 'name',
				 'label'   => 'Όνομα',
				 'rules'   => 'trim|required|max_length[50]'
			  ),
		   array(
				 'field'   => 'surname',
				 'label'   => 'Επώνυμο',
				 'rules'   => 'trim|required|max_length[50]'
			  ),
		   array(
				 'field'   => 'username',
				 'label'   => 'Username',
				 'rules'   => 'trim|required|max_length[50]'
			  ),   
		   array(
				 'field'   => 'level',
				 'label'   => 'Επίπεδο',
				 'rules'   => 'trim|required'
			  )		
		)	,
	'iatreio_validation' => array(
		   array(
				 'field'   => 'name',
				 'label'   => 'Όνομα',
				 'rules'   => 'trim|required|max_length[50]'
			  ),
		   array(
				 'field'   => 'color',
				 'label'   => 'Χρώμα',
				 'rules'   => 'trim|required|max_length[50]'
			  ),
		   array(
				 'field'   => 'active',
				 'label'   => 'Ενεργό',
				 'rules'   => 'trim'
			  )
		),
	'notes_validation' => array(
		   array(
				 'field'   => 'noteText',
				 'label'   => 'Σημείωση',
				 'rules'   => 'trim|required|max_length[1000]'
			  ),
		   array(
				 'field'   => 'noteDate',
				 'label'   => 'Ημερομηνία',
				 'rules'   => 'trim|required|date'
			  ),
		   array(
				 'field'   => 'active',
				 'label'   => 'Ενεργό',
				 'rules'   => 'trim'
			  )
		),
		'password_validation' => array(
		   array(
				 'field'   => 'current',
				 'label'   => 'Τρέχον password',
				 'rules'   => 'trim|required|max_length[10]'
			  ),
		   array(
				 'field'   => 'new1',
				 'label'   => 'Νέο password',
				 'rules'   => 'trim|required|max_length[10]|callback_validate_passwords'
			  ),
		   array(
				 'field'   => 'new2',
				 'label'   => 'Νέο password (επανάληψη)',
				 'rules'   => 'trim|required|max_length[10]'
			  )
		),
	'argia_validation' => array(
		   array(
				 'field'   => 'description',
				 'label'   => 'Περιγραφή',
				 'rules'   => 'trim|required|max_length[200]'
			  ),
		   array(
				 'field'   => 'datum',
				 'label'   => 'Ημερομηνία',
				 'rules'   => 'trim|required|date'
			  )
		)		
	);
	
	
?>