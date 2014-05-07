<?php
class Process extends AppModel
{
var $name = 'Process';
public $belongsTo=array('Schedulecategory');
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
		
        'process_name' => array(
            'rule' => array('maxLength', '100'),
			'message' => 'Maximum 100 characters allowed'
         ),
		  'schedulecategory_id' => array(
            'rule' => array('NotEmpty'),
			'message' => 'schedule category empty'
         )
		 );
}
?>
