<?php
class UsersController extends AppController {

public $name = 'Users';
public $paginate = array('limit' =>3);

	  public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('login');
    }

    public function login() {
		if ($this->request->is('post')) {
		
			if ($this->Auth->login()) {
			
			$result = $this->User->find('first', array(
										'conditions'=>array(
											'User.username'=>$this->data['User']['username']
										)));
			$company_id=$result['Company']['id'];
			$this->Session->write('company_id', $company_id);	
			$this->Session->write('User', $result['User']['username']);
			$this->redirect($this->Auth->redirect());
			} else {
				$this->Session->setFlash(__('Invalid username or password, try again'));
			}
		}
	}
	public function logout() {
		 $this->Session->destroy();
		$this->redirect($this->Auth->logout());
	}
	/*
	public function login(){
	if ($this->request->is('post')) {
		
		$password=base64_encode($this->request->data['User']['password']);
		$result = $this->User->find('first', array(
										'conditions'=>array(
											'User.email'=>$this->request->data['User']['username'],
											'User.password'=>$password,
											'User.status'=>1
										)));
		
		
		
		if(isset($result['User']['email'])){
		
		$email=$result['User']['email'];
		$domain=substr(strrchr($email, "@"),1);
		
		$this->loadModel('Company');
		$company = $this->Company->find('first',array(
		'conditions' => array('Company.domain_name'=>$domain))); 
		$company_id=$company['Company']['id'];
		$this->Session->write('company_id', $company_id);	
		
		$this->Session->write('User', $result['User']['username']);
			if($result['User']['email']=="admin@admin.com"){
			$this->redirect(array('controller'=>'Companies','action' => 'index'));
			}else{
			$this->redirect(array('action' => 'home'));
			}
			}else{
			$this->Session->setFlash('Invalid Username or password');
			$this->redirect(array('action'=>'index'));
			//exit;
			}
		}
		
	}*/
	public function add() {
		$this->loadModel('Department'); /* Get data from departments table and load it in department name combo*/
		$options = $this->Department->find('list',array(
		'conditions' => array(), 
		'fields' => array('department_name'))); 
		$this->set('options',$options);
		
		$this->loadModel('Usergroup'); /* Get data from departments table and load it in department name combo*/
		$usergroup = $this->Usergroup->find('list',array(
		'conditions' => array(), 
		'fields' => array('usergroup_name'))); 
		$this->set('usergroup',$usergroup);
		
		$this->loadModel('Company'); /* Get data from departments table and load it in department name combo*/
		$Company = $this->Company->find('list',array(
		'conditions' => array(), 
		'fields' => array('domain_name','domain_name'))); 
		$this->set('Company',$Company);
		
        if ($this->request->is('post')) {
		$data=$this->request->data;
		$data['User']['email']=$data['User']['email_name']."@".$data['User']['domain'];
		$company_id = $this->Company->find('all',array(
		'conditions' => array('Company.domain_name'=>$data['User']['domain']))); 
		$data['User']['company_id']=$company_id['0']['Company']['id'];
		//pr($data);
		//exit;
		
		unset($data['User']['domain']);
		$user_count=$this->User->find('count',array('conditions'=>array('User.company_id'=>$data['User']['company_id'])));
		$available_user=$company_id['0']['Company']['maximum_users'];
		
		if($user_count>=$available_user){
			$this->Session->setFlash('Not available for new user registering for your selected domain');
			}else{
			//pr($data);
			//exit;
			//$data['User']['password']=base64_encode($data['User']['password']);
			//$data['User']['confirm_password']=base64_encode($data['User']['confirm_password']);
				if ($this->User->save($data)) {
					$this->Session->setFlash('Your records has been saved.');
					$this->redirect(array('action' => 'index'));
				} else {
				   $this->Session->setFlash('The user could not be saved. Please, try again.');
				}
			}
		}
    }
	public function change_password() {
		if ($this->request->is('post')) {
		
		
		$username=$this->Session->read('User');
		$password=base64_encode($this->request->data['User']['old_password']);
		$confirm_password=base64_encode($this->request->data['User']['confirm_password']);
		$new_password=base64_encode($this->request->data['User']['password']);
		$new_password1="'".$new_password."'";
			if($confirm_password!=$new_password){
			$this->Session->setFlash('Confirm password not match.');
			}else{
			$res=$this->User->find('first', array(
												'conditions'=>array(
													'User.username'=>$username,
													'User.password'=>$password
												)));
				if(isset($res['User']['username'])){
				$this->User->UpdateAll(array('User.password' => $new_password1), array('AND' => array('User.username'=>$username)));
				$this->Session->setFlash('Your password successfully changed.');
				$this->redirect(array('action'=>'home'));
				}else{
				$this->Session->setFlash('Invalid password');
				}
				
			}
		}
	}
	public function forget_password() {
		if ($this->request->is('post')) {
		$username=$this->request->data['User']['username'];
		$res=$this->User->find('first', array(
											'conditions'=>array(
												'User.username'=>$username
											)));
		$password=base64_decode($res['User']['password']);
		if(isset($res['User']['username'])){
		 App::uses('CakeEmail', 'Network/Email');
				   $email = new CakeEmail();
				  $email->emailFormat('html');
				   $email->from(array('sankar.k@angleritech.com' => 'Login details'));
				   $email->to($res['User']['email']);
				   $email->subject('Reg: Your login password');
				   $email->send("Your Login Details :<br> Username : $username<br> Password : $password  ");
				
				   $this->Session->setFlash('Your password sent to your mail.');
			}
		}
	}
	
	public function index(){
		
		$this->loadModel('Department'); /* Get data from departments table and load it in department name combo*/
			$dept = $this->Department->find('list',array(
			'conditions' => array(), 
			'fields' => array('department_name'))); 
			$this->set('dept',$dept);
			
			$username=$this->Session->read('User');
			$company_id=$this->Session->read('company_id');
			
			if ($this->request->is('post')) {
			
			$this->set('count',$this->User->find('count'));
			$search=$this->request->data['User']['name'];
			//$this->set('options', $this->User->find('all',array('conditions'=>array("User.first_name LIKE '%$search%'" ))));
			$cond=array("User.first_name LIKE '%$search%'","User.company_id"=>$company_id );
			$this->set('options', $this->paginate('User',$cond));
			}else{
			$cond=array("User.company_id"=>$company_id);
			$this->set('options', $this->paginate('User',$cond));
			}
			
	}
	public function edit($id = null) {
		$this->User->id = $id;
		$this->loadModel('Department'); /* Get data from departments table and load it in department name combo*/
		$options = $this->Department->find('list',array(
		'conditions' => array(), 
		'fields' => array('department_name'))); 
		$this->set('options',$options);
		
			$this->loadModel('Usergroup'); /* Get data from departments table and load it in department name combo*/
		$usergroup = $this->Usergroup->find('list',array(
		'conditions' => array(), 
		'fields' => array('usergroup_name'))); 
		$this->set('usergroup',$usergroup);
		
		$this->loadModel('Company'); /* Get data from departments table and load it in department name combo*/
		$Company = $this->Company->find('list',array(
		'conditions' => array(), 
		'fields' => array('domain_name','domain_name'))); 
		$this->set('Company',$Company);
		
		if ($this->request->is('post') || $this->request->is('put')) {
			$data=$this->request->data;
			$data['User']['email']=$data['User']['username']."@".$data['User']['domain'];
			//$data['User']['company_id']=$this->Session->read('company_id');
			unset($data['User']['domain']);
			
			$data['User']['password']=base64_encode($data['User']['password']);
			$data['User']['confirm_password']=base64_encode($data['User']['confirm_password']);
		
			if ($this->User->save($data)) {
				$this->Session->setFlash('The user has been updated');
				$this->redirect(array('action' => 'home'));
			} else {
				$this->Session->setFlash('The user could not be update. Please, try again.');
			}
		}else{
		$res = $this->User->read();	
		$res['User']['password']=base64_decode($res['User']['password']);
		$this->request->data=$res;
                pr($res);
		}
	}
	public function delete($id = null) {
		$this->User->id = $id;
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted'));
			$this->redirect(array('action'=>'home'));
		}
	}
	
	function load_user_ajax_data(){
		$status=$_POST['status'];
		$department=$_POST['department'];
		$company_id=$this->Session->read('company_id');
		if(($status!="")&&($department!="")){
		$cond=array('conditions'=>array('User.company_id'=>$company_id,'User.status'=>$status,'User.department_id'=>$department));
			$res=$this->set('options', $this->User->find('all', $cond));
			}
		if(($status!="")&&($department=="")){
		$cond=array('conditions'=>array('User.company_id'=>$company_id,'User.status'=>$status));
			$res=$this->set('options', $this->User->find('all', $cond));
			}
		if(($status=="")&&($department!="")){
		$cond=array('conditions'=>array('User.company_id'=>$company_id,'User.department_id'=>$department));
			$res=$this->set('options', $this->User->find('all',$cond));
			}
		if(($status=="")&&($department=="")){
			$cond=array('conditions'=>array('User.company_id'=>$company_id));
			$res=$this->set('options', $this->User->find('all',$cond));
			}
		$this->layout="ajax";
	}
	public function load_page($id){
	
	$val=($id*2).",3";
	$this->set('options',$this->User->find('all',array('limit'=>$val)));
	$this->layout="ajax";
	}
	
	public function check_user(){
	$val=$_POST['value'];
	$res=$this->User->find('first',array('conditions'=>array('User.username'=>$val)));
	if($res){
	$this->set('val',1);
	}else{
	$this->set('val',0);
	}
	
	$this->layout="ajax";
	}
	
}
?>