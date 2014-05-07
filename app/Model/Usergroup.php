<?php
class Usergroup extends AppModel
{
var $name = 'Usergroup';
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
public $validate = array(
		
        'usergroup_name' => array(
            'rule' => array('maxLength', '100'),
			'message' => 'Maximum 100 characters allowed'
         ),
		 'department_id' => array(
            'rule' => array('notEmpty'),
			'message'=>'Department id empty'
			)
		 );
	}
?>
