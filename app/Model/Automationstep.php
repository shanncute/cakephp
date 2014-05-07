<?php
class Automationstep extends AppModel{
var $name = 'Automationstep';
// public $belongsTo=array('Automation',
		
		// 'Actionsql' => array(
            // 'className' => 'Actionsql',
            // 'foreignKey' => false,
            // 'conditions' => '',
            // 'fields' => '',
            // 'order' => ''
        // ),
		// 'Actionemail' => array(
            // 'className' => 'Actionemail',
            // 'foreignKey' => false,
            // 'conditions' => '',
            // 'fields' => '',
            // 'order' => ''
        // ),
		// 'Action' => array(
            // 'className' => 'Action',
            // 'foreignKey' => false,
            // 'conditions' => array('Action.id' => array('Actionsql.action_id','Actionemail.action_id')),
            // 'fields' => '',
            // 'order' => ''
        // ));
public $belongsTo=array('Automation','Action');
}
?>
