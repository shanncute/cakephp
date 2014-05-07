<?php
class Department extends AppModel{
var $name = 'Department';
	var $actsAs = array(
	    'Containable' => array(),
		'Eav' => array(
			'type' => 'entity',
	        'virtualKeys' => array(
	        	'uuid' => array(
	        		'Company'
	            )
	        )
	    )
	);
/*
public $validate = array(
		
        'department_name' => array(
            'rule' => array('maxLength', '100'),
			'message' => 'Maximum 100 characters allowed'
			)
		 );
		 */
}
?>
