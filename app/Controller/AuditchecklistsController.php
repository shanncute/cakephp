<?php
class AuditchecklistsController extends AppController {

public $name = 'Auditchecklists';
public $paginate = array('limit' =>3);

	public function index(){
		$this->set('count',$this->Auditchecklist->find('count'));
		if ($this->request->is('post')) {
			
			$search=$this->request->data['Auditchecklist']['name'];
			
			$cond=array("Auditchecklist.auditchecklist_name LIKE '%$search%'" );
			$this->set('options', $this->paginate('Auditchecklist',$cond));
			}else{
			$cond=array("Auditchecklist.company_id"=>$this->Session->read('company_id') );
			$this->set('options', $this->paginate('Auditchecklist',$cond));
			}
	}
	public function add(){
	
		$this->loadModel('Department'); /* Get data from departments table and load it in department name combo*/
		$dept = $this->Department->find('list',array(
		'conditions' => array(), 
		'fields' => array('department_name'))); 
		$this->set('dept',$dept);
		
		$this->loadModel('Schedulecategory'); /* Get data from departments table and load it in department name combo*/
		$options = $this->Schedulecategory->find('list',array(
		'conditions' => array(), 
		'fields' => array('schedulecategory_name'))); 
		$this->set('options',$options);
		
		$this->loadModel('Process'); /* Get data from departments table and load it in department name combo*/
		$process = $this->Process->find('list',array(
		'conditions' => array(), 
		'fields' => array('process_name'))); 
		$this->set('process',$process);
		
		$attributeList = Set::extract('/Attribute/name',$this->Auditchecklist->getAttributes());
		$auditchecklist = array('Auditchecklist' => array());
		foreach($attributeList as $key=> $value) {
	        //debug($value[]);
	        $auditchecklist['Auditchecklist'][$value] = null; 
	    }
	    $this->set('auditchecklist',$auditchecklist);
		
		if($this->request->is('post')){
			$data=$this->request->data;
			$data['Auditchecklist']['company_id']=$this->Session->read('company_id');
			$this->Auditchecklist->Save($data);
			$this->Session->setFlash('Auditchecklist Registered.');
			$this->redirect(array('action'=>'index'));
		}
    }
	public function edit($id = null) {
		
		$this->loadModel('Department'); /* Get data from departments table and load it in department name combo*/
		$dept = $this->Department->find('list',array(
		'conditions' => array(), 
		'fields' => array('department_name'))); 
		$this->set('dept',$dept);
		
		$this->loadModel('Schedulecategory'); /* Get data from departments table and load it in department name combo*/
		$options = $this->Schedulecategory->find('list',array(
		'conditions' => array(), 
		'fields' => array('schedulecategory_name'))); 
		$this->set('options',$options);
		
		$this->loadModel('Process'); /* Get data from departments table and load it in department name combo*/
		$process = $this->Process->find('list',array(
		'conditions' => array(), 
		'fields' => array('process_name'))); 
		$this->set('process',$process);
		
		$this->Auditchecklist->id = $id;
		if ($this->request->is('post') || $this->request->is('put')) {
			$data=$this->request->data;
			$data['Auditchecklist']['company_id']=$this->Session->read('company_id');
			if ($this->Auditchecklist->save($data)) {
				$this->Session->setFlash('The Auditchecklist has been updated');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The Auditchecklist could not be update. Please, try again.');
			}
		}else{
		$res = $this->Auditchecklist->read();	
		$this->request->data=$res;
		}
	}
	public function delete($id = null) {
	$this->Auditchecklist->id = $id;
	if ($this->Auditchecklist->delete()) {
			$this->Session->setFlash(__('Auditchecklist deleted'));
			$this->redirect(array('action'=>'index'));
		}
	}
	function ajax_data(){
		$status=$_POST['status'];
		if($status!=""){
			$res=$this->set('options', $this->Auditchecklist->find('all', array(
												'conditions'=>array(
													'Auditchecklist.status'=>$status
												))));
			}
		if($status==""){
			$res=$this->set('options', $this->Auditchecklist->find('all'));
			}
		$this->layout="ajax";
	}
	public function load_page($id){
	$val=($id*2).",3";
	$this->set('options',$this->Auditchecklist->find('all',array('limit'=>$val)));
	$this->layout="ajax";
	}
}
?>