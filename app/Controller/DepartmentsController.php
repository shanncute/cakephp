<?php
class DepartmentsController extends AppController {

public $name = 'Departments';
public $paginate = array('limit' => 5);
var $scaffold;
	public function index(){
			
			
	if ($this->request->is('post')) {
			$search=$this->request->data['Department']['name'];
			$cond=array("Department.department_name LIKE '%$search%'" );
			$this->set('options', $this->paginate('Department',$cond));
			}else{
			$cond=array("Department.company_id"=>$this->Session->read('company_id') );
			$this->set('options', $this->paginate('Department',$cond));
			
			/*$model = ucfirst(Inflector::singularize($this->params['controller']));
			$this->loadmodel('Attribute');
			$res=$this->Attribute->find('all',array('conditions'=>array('Attribute.model'=>$model,'Attribute.name'=>'Department_email')));
			$att_id=$res[0]['Attribute']['id'];
			$d_email=$this->Department->query("select value from attributes_string_values where value like '%%' and  attribute_id='".$att_id."'");
			pr($d_email);*/
			}
			
	}
	public function add(){
		
	    $attributeList = Set::extract('/Attribute/name',$this->Department->getAttributes());
		$department = array('Department' => array());
		foreach($attributeList as $key=> $value) {
	        
	        $department['Department'][$value] = null; 
	    }
	    $this->set('department',$department);
		
		
		if($this->request->is('post')){
			$data=$this->request->data;
			$data['Department']['company_id']=$this->Session->read('company_id');
			//pr($data);
			$this->loadModel('Automationstep');
			$res=$this->Automationstep->find('all',array('conditions'=>array('Automation.module'=>'Department')));
			$this->set('options',$res);
			$count=count($res);
			
			for($i=0;$i<=$count;$i++){
			$mod=$res[$i]['Action']['action_type'];
			$this->loadModel($mod);
			$exe=$this->$mod->find('all');
			
			$act=$exe[0][$mod];
			if($mod=="Actionsql"){
			//$this->Department->query($act['query']);
			}
			if($mod=="Actionsetfield"){
			$val=$act['value'];
			$this->$act['module']->updateAll(array($act['field_name']=>"'$val'"), array('AND' => array($act['module'].'.'.'id'=>1)));
			}
			if($mod=="Actionremovefield"){
			$val=$act['value'];
			$this->$act['module']->updateAll(array($act['field_name']=>"'$val'"), array('AND' => array($act['module'].'.'.'id'=>1)));
			}
			if($mod=="Actionemail"){
			
			//pr($act);
			
				$from=$act['mail_sender'];
						$to=$act['To'];
						$cc=$act['Cc'];
						$bcc=$act['Bcc'];
						$subject=$act['subject'];
						$body=$act['body'];
						$signature=$act['signature'];
						$tt=str_replace('"','',$to);
						//debug($tt);
						//exit;
					App::uses('CakeEmail', 'Network/Email');
					   $email = new CakeEmail();
									   $email->emailFormat('html');
					   $email->from($from);
					   $email->to('sankar.k@angleritech.com');
									  
									   //$email->cc($cc);
									   //$email->($bcc);
					   $email->subject($subject);
					   $email->send($body."<br>".$signature);
			
			}
		
		}
		
		exit;
				
		$this->Department->Save($data);
		$this->Session->setFlash('Department Registered.');
		$this->redirect(array('action'=>'index'));
		}
    }
	
	public function edit($id = null,$action) {
		$this->Department->id = $id;
		
		$this->loadModel('Automationstep');
			$res=$this->Automationstep->find('all',array('conditions'=>array('Automation.automation_type'=>'quick_link','Action.action_name'=>$action)));
			$this->set('actions',$res);
			$action_name=$action;
			$this->set('action_name',$action_name);
		if ($this->request->is('post') || $this->request->is('put')) {
			$data=$this->request->data;
			$data['Department']['company_id']=$this->Session->read('company_id');
			$data['Department']['id']=$id;
			
			if ($this->Department->saveAll($data)) {
				$this->Session->setFlash('The Department has been updated');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The Department could not be update. Please, try again.');
			}
		}else{
		
			$res = $this->Department->read();	
			$this->request->data=$res;
			$attributeList = Set::extract('/Attribute/name',$this->Department->getAttributes());
			$department = array('Department' => array());
			foreach($attributeList as $key=> $value) {
				//debug($value[]);
				$department['Department'][$value] = null; 
			}
			$this->set('department',$department);
		}
	}
	public function delete($id = null) {
	$this->Department->id = $id;
	if ($this->Department->delete()) {
			$this->Session->setFlash(__('Department deleted'));
			$this->redirect(array('action'=>'index'));
		}
	}
	function ajax_data(){
		$status=$_POST['status'];
		if($status!=""){
			$res=$this->set('options', $this->Department->find('all', array(
												'conditions'=>array(
													'Department.status'=>$status
												))));
			}
		if($status==""){
			$res=$this->set('options', $this->Department->find('all'));
			}
		$this->layout="ajax";
	}
	public function load_page($id){
	$val=($id*2).",3";
	$this->set('options',$this->Department->find('all',array('limit'=>$val)));
	$this->layout="ajax";
	}
	function find_replace() {
	    debug($this->Department->findReplace('Mateo','Carlos',null));
	    
	}
	public function quick_list(){
			$id=$_POST['id'];
			$this->layout="ajax";
			$this->loadModel('Automationstep');
			$res=$this->Automationstep->find('all',array('conditions'=>array('Automation.automation_type'=>'quick_link')));
			//pr($res);
			$this->set('quicklinks',$res);
			$this->set('id',$id);
	}
}
?>