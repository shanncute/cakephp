<?php
class SchedulesubcategoriesController extends AppController {

public $name = 'Schedulesubcategories';
public $paginate = array('limit' =>3);
	public function index(){
		$this->set('count',$this->Schedulesubcategory->find('count'));
		if ($this->request->is('post')) {
			
			$search=$this->request->data['Schedulesubcategory']['name'];
			//$this->set('options', $this->Schedulesubcategory->find('all',array('conditions'=>array("Schedulesubcategory.Schedulesubcategory_name LIKE '%$search%'" ))));
			$cond=array("Schedulesubcategory.Schedulesubcategory_name LIKE '%$search%'" );
			$this->set('options', $this->paginate('Schedulesubcategory',$cond));
			}else{
			$cond=array("Schedulesubcategory.company_id"=>$this->Session->read('company_id') );
			$this->set('options', $this->paginate('Schedulesubcategory',$cond));
			}
	}
	public function add(){
	
		 $attributeList = Set::extract('/Attribute/name',$this->Schedulesubcategory->getAttributes());
		$schedulesubcategory = array('Schedulesubcategory' => array());
		foreach($attributeList as $key=> $value) {
	        //debug($value[]);
	        $schedulesubcategory['Schedulesubcategory'][$value] = null; 
	    }
	    $this->set('schedulesubcategory',$schedulesubcategory);
		
		$this->loadModel('Schedulecategory'); /* Get data from departments table and load it in department name combo*/
		$options = $this->Schedulecategory->find('list',array(
		'conditions' => array(), 
		'fields' => array('schedulecategory_name'))); 
		$this->set('options',$options);
		if($this->request->is('post')){
			$data=$this->request->data;
			$data['Schedulesubcategory']['company_id']=$this->Session->read('company_id');
			//pr($data);
			//exit;
			$this->Schedulesubcategory->Save($data);
			$this->Session->setFlash('Schedulesubcategory Registered.');
			$this->redirect(array('action'=>'index'));
		}
    }
	public function edit($id = null) {
		
		$this->Schedulesubcategory->id = $id;
		
		
		$this->loadModel('Schedulecategory'); /* Get data from departments table and load it in department name combo*/
		$options = $this->Schedulecategory->find('list',array(
		'conditions' => array(), 
		'fields' => array('schedulecategory_name'))); 
		$this->set('options',$options);
		
		if ($this->request->is('post') || $this->request->is('put')) {
			$data=$this->request->data;
			$data['Schedulesubcategory']['company_id']=$this->Session->read('company_id');
			if ($this->Schedulesubcategory->save($data)) {
				$this->Session->setFlash('The Schedulesubcategory has been updated');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The Schedulesubcategory could not be update. Please, try again.');
			}
		}else{
		$res = $this->Schedulesubcategory->read();	
		$this->request->data=$res;
		}
	}
	public function delete($id = null) {
	$this->Schedulesubcategory->id = $id;
	if ($this->Schedulesubcategory->delete()) {
			$this->Session->setFlash(__('Schedulesubcategory deleted'));
			$this->redirect(array('action'=>'index'));
		}
	}
	function ajax_data(){
		$status=$_POST['status'];
		if($status!=""){
			$res=$this->set('options', $this->Schedulesubcategory->find('all', array(
												'conditions'=>array(
													'Schedulesubcategory.status'=>$status
												))));
			}
		if($status==""){
			$res=$this->set('options', $this->Schedulesubcategory->find('all'));
			}
		$this->layout="ajax";
	}
	public function load_page($id){
	$val=($id*2).",3";
	$this->set('options',$this->Schedulesubcategory->find('all',array('limit'=>$val)));
	$this->layout="ajax";
	}
}
?>