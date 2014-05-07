<?php
App::uses('AuthComponent', 'Controller/Component');
class User extends AppModel
{
var $name = 'User';
public $belongsTo = array('Department','Usergroup','Company');


public $validate = array(
		
        'title' => array(
            'rule' => array('maxLength', '100'),
			'message' => 'Maximum 100 characters allowed'
         ),
		 'first_name' => array(
            'rule' => array('maxLength', '100'),
			'message' => 'Maximum 100 characters allowed'
         ),
		 
        'old_password' => array(
            'rule' => array('maxLength', '100'),
			'message' => 'Maximum 100 characters allowed'
         ),
		 'email'=>array(
			'Valid email'=>array(
				'rule'=>array('email'),
				'message'=>'Please enter a valid email address'
			)
		),
		 'domain'=>array(
			'Not empty'=>''
		),
		
		 'username' => array(
            'rule' => array('maxLength', '50'),
			'message' => 'Maximum 50 characters allowed'
         ),
        'password'=>array(
		    'Not empty'=>array(
		        'rule' => array('maxLength', '15'),
			'message' => 'Maximum 15 characters allowed'
		    ),
			'Match passwords'=>array(
		        'rule'=>'matchPasswords',
		        'message'=>'Your passwords do not match'
		    )
		    
		),
		'confirm_password'=>array(
		    'Not empty'=>array(
		        'rule' => array('maxLength', '15'),
			'message' => 'Maximum 15 characters allowed'
		    )
		)
    );
	public function matchPasswords($data) {
	    if ($data['password'] == $this->data['User']['confirm_password']) {
	        return true;
	    }
	    $this->invalidate('confirm_password', 'Your passwords do not match');
	    return false;
	}
	public function beforeSave($options = array()) {
		if (isset($this->data[$this->alias]['password'])) {
			$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
		}
		return true;
	}
}
?>
