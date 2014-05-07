<?php
class Schedulecategory extends AppModel
{
var $name = 'Schedulecategory';
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
		
        'schedulecategory_name' => array(
            'rule' => array('maxLength', '100'),
			'message' => 'Maximum 100 characters allowed'
         ),
		    'schedule_type' => array(
            'rule' => array('NotEmpty'),
			'message' => 'schedule type empty'
         )
		 
		 );


}
?>
