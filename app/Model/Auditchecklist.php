<?php
class Auditchecklist extends AppModel
{
var $name = 'Auditchecklist';
public $belongsTo=array('Department','Schedulecategory','Process');
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
		
        'auditschedule_name' => array(
            'rule' => array('maxLength', '100'),
			'message' => 'Maximum 100 characters allowed'
         )
		 );
}
?>
