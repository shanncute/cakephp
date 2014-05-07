<?php
class Meetingroom extends AppModel
{
var $name = 'Meetingroom';
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
		
        'meetingroom_name' => array(
            'rule' => array('maxLength', '100'),
			'message' => 'Maximum 100 characters allowed'
         )
		 );
}
?>
