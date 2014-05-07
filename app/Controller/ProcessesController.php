<?php
class ProcessesController extends AppController {

public $name = 'Processes';
public $paginate = array('limit' =>3);
	public function index(){
		$this->set('count',$this->Process->find('count'));
		if ($this->request->is('post')) {
			
			$search=$this->request->data['Process']['name'];
			//$this->set('options', $this->Process->find('all',array('conditions'=>array("Process.process_name LIKE '%$search%'" ))));
			$cond=array("Process.process_name LIKE '%$search%'" );
			$this->set('options', $this->paginate('Process',$cond));
			}else{
			$cond=array("Process.company_id"=>$this->Session->read('company_id') );
			$this->set('options', $this->paginate('Process',$cond));
			}
	}
	public function add(){
		$this->loadModel('Schedulecategory'); /* Get data from departments table and load it in department name combo*/
		$options = $this->Schedulecategory->find('list',array(
		'conditions' => array(), 
		'fields' => array('schedulecategory_name'))); 
		$this->set('options',$options);
		
		 $attributeList = Set::extract('/Attribute/name',$this->Process->getAttributes());
		$process = array('Process' => array());
		foreach($attributeList as $key=> $value) {
	        //debug($value[]);
	        $process['Process'][$value] = null; 
	    }
	    $this->set('process',$process);
		
		if($this->request->is('post')){
			$data=$this->request->data;
			$data['Process']['company_id']=$this->Session->read('company_id');
			$this->Process->Save($data);
			$this->Session->setFlash('Process Registered.');
			$this->redirect(array('action'=>'index'));
		}
    }
	public function edit($id = null) {
		$this->loadModel('Schedulecategory'); /* Get data from departments table and load it in department name combo*/
		$options = $this->Schedulecategory->find('list',array(
		'conditions' => array(), 
		'fields' => array('schedulecategory_name'))); 
		$this->set('options',$options);
		$this->Process->id = $id;
		if ($this->request->is('post') || $this->request->is('put')) {
			$data=$this->request->data;
			$data['Process']['company_id']=$this->Session->read('company_id');
			if ($this->Process->save($data)) {
				$this->Session->setFlash('The Process has been updated');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The Process could not be update. Please, try again.');
			}
		}else{
		$res = $this->Process->read();	
		$this->request->data=$res;
		}
	}
	public function delete($id = null) {
	$this->Process->id = $id;
	if ($this->Process->delete()) {
			$this->Session->setFlash(__('Process deleted'));
			$this->redirect(array('action'=>'index'));
		}
	}
	function ajax_data(){
		$status=$_POST['status'];
		if($status!=""){
			$res=$this->set('options', $this->Process->find('all', array(
												'conditions'=>array(
													'Process.status'=>$status
												))));
			}
		if($status==""){
			$res=$this->set('options', $this->Process->find('all'));
			}
		$this->layout="ajax";
	}
	public function load_page($id){
	$val=($id*2).",3";
	$this->set('options',$this->Process->find('all',array('limit'=>$val)));
	$this->layout="ajax";
	}
}
?>