<?php
class AuditschedulesController extends AppController {

public $name = 'Auditschedules';
public $paginate = array('limit' => 2);

	public function index(){
	
		
		if ($this->request->is('post')) {
			$search=$this->request->data['auditor']['name'];
			$cond=array("Auditschedule.auditor LIKE '%$search%'" );
			$this->set('options', $this->paginate('Auditschedule',$cond));
			}else{
			$cond=array("Auditschedule.company_id"=>$this->Session->read('company_id') );
			$this->set('options', $this->paginate('Auditschedule',$cond));
			}
			
	}
	public function add(){
		$this->loadModel('Department'); /* Get data from departments table and load it in department name combo*/
		$Department = $this->Department->find('list',array(
		'conditions' => array(), 
		'fields' => array('department_name'))); 
		$this->set('Department',$Department);
		
		$this->loadModel('Schedulecategory'); /* Get data from Schedulecategory table and load it in department name combo*/
		$Schedulecategory = $this->Schedulecategory->find('list',array(
		'conditions' => array(), 
		'fields' => array('schedulecategory_name'))); 
		$this->set('Schedulecategory',$Schedulecategory);
		
		$this->loadModel('Schedulesubcategory'); /* Get data from Schedulesubcategory table and load it in department name combo*/
		$Schedulesubcategory = $this->Schedulesubcategory->find('list',array(
		'conditions' => array(), 
		'fields' => array('schedulesubcategory_name'))); 
		$this->set('Schedulesubcategory',$Schedulesubcategory);
		
		$this->loadModel('Process'); /* Get data from Process table and load it in department name combo*/
		$Process = $this->Process->find('list',array(
		'conditions' => array(), 
		'fields' => array('process_name'))); 
		$this->set('Process',$Process);
		
		$this->loadModel('Meetingroom'); /* Get data from Meetingroom table and load it in department name combo*/
		$Meetingroom = $this->Meetingroom->find('list',array(
		'conditions' => array(), 
		'fields' => array('meetingroom_name'))); 
		$this->set('Meetingroom',$Meetingroom);
		
		 $attributeList = Set::extract('/Attribute/name',$this->Auditschedule->getAttributes());
		$auditschedule = array('Auditschedule' => array());
		foreach($attributeList as $key=> $value) {
	        //debug($value[]);
	        $auditschedule['Auditschedule'][$value] = null; 
	    }
		//pr($auditschedule);
	    $this->set('auditschedule',$auditschedule);
		
	if($this->request->is('post')){
	$data=$this->request->data;
	$data['Auditschedule']['company_id']=$this->Session->read('company_id');
	//pr($data);
	//exit;
	$this->Auditschedule->Save($data);
	$this->Session->setFlash('Auditschedule Registered.');
	$this->redirect(array('action'=>'index'));
	}
    }
	public function edit($id = null) {
	
		$this->loadModel('Department'); /* Get data from departments table and load it in department name combo*/
		$Department = $this->Department->find('list',array(
		'conditions' => array(), 
		'fields' => array('department_name'))); 
		$this->set('Department',$Department);
		
		$this->loadModel('Schedulecategory'); /* Get data from Schedulecategory table and load it in department name combo*/
		$Schedulecategory = $this->Schedulecategory->find('list',array(
		'conditions' => array(), 
		'fields' => array('schedulecategory_name'))); 
		$this->set('Schedulecategory',$Schedulecategory);
		
		$this->loadModel('Schedulesubcategory'); /* Get data from Schedulesubcategory table and load it in department name combo*/
		$Schedulesubcategory = $this->Schedulesubcategory->find('list',array(
		'conditions' => array(), 
		'fields' => array('schedulesubcategory_name'))); 
		$this->set('Schedulesubcategory',$Schedulesubcategory);
		
		$this->loadModel('Process'); /* Get data from Process table and load it in department name combo*/
		$Process = $this->Process->find('list',array(
		'conditions' => array(), 
		'fields' => array('process_name'))); 
		$this->set('Process',$Process);
		
		$this->loadModel('Meetingroom'); /* Get data from Meetingroom table and load it in department name combo*/
		$Meetingroom = $this->Meetingroom->find('list',array(
		'conditions' => array(), 
		'fields' => array('meetingroom_name'))); 
		$this->set('Meetingroom',$Meetingroom);
		
		$this->Auditschedule->id = $id;
		if ($this->request->is('post') || $this->request->is('put')) {
			$data=$this->request->data;
			$data['Auditschedule']['company_id']=$this->Session->read('company_id');
			if ($this->Auditschedule->save($data)) {
				$this->Session->setFlash('The Auditschedule has been updated');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The Auditschedule could not be update. Please, try again.');
			}
		}else{
		$res = $this->Auditschedule->read();	
		$this->request->data=$res;
		}
	}
	public function delete($id = null) {
	$this->Auditschedule->id = $id;
	if ($this->Auditschedule->delete()) {
			$this->Session->setFlash(__('Auditschedule deleted'));
			$this->redirect(array('action'=>'index'));
		}
	}
	function ajax_data(){
		$status=$_POST['status'];
		if($status!=""){
			$res=$this->set('options', $this->Auditschedule->find('all', array(
												'conditions'=>array(
													'Auditschedule.status'=>$status
												))));
			}
		if($status==""){
			$res=$this->set('options', $this->Auditschedule->find('all'));
			}
		$this->layout="ajax";
	}
	public function load_page($id){
	$val=($id*2).",3";
	$this->set('options',$this->Auditschedule->find('all',array('limit'=>$val)));
	$this->layout="ajax";
	}
}
?>