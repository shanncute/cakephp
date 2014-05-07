<?php
class Schedulesubcategory extends AppModel
{
var $name = 'Schedulesubcategory';
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
		
        'schedulesubcategory_name' => array(
            'rule' => array('maxLength', '100'),
			'message' => 'Maximum 100 characters allowed'
         ),
		  'schedule_type' => array(
            'rule' => array('NotEmpty'),
			'message' => 'schedule type empty'
         ),
		  'schedulecategory_id' => array(
            'rule' => array('NotEmpty'),
			'message' => 'schedule category empty'
         )
		 );
}
?>
