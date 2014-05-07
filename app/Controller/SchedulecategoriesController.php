<?php
class SchedulecategoriesController extends AppController {

public $name = 'Schedulecategories';
public $paginate = array('limit' =>3);
	public function index(){
		$this->set('count',$this->Schedulecategory->find('count'));
		if ($this->request->is('post')) {
			
			$search=$this->request->data['Schedulecategory']['name'];
			
			$cond=array("Schedulecategory.schedulecategory_name LIKE '%$search%'" );
			$this->set('options', $this->paginate('Schedulecategory',$cond));
			}else{
			$cond=array("Schedulecategory.company_id"=>$this->Session->read('company_id') );
			$this->set('options', $this->paginate('Schedulecategory',$cond));
			}
			
	}
	public function add(){
		
		 $attributeList = Set::extract('/Attribute/name',$this->Schedulecategory->getAttributes());
		$schedulecategory = array('Schedulecategory' => array());
		foreach($attributeList as $key=> $value) {
	        //debug($value[]);
	        $schedulecategory['Schedulecategory'][$value] = null; 
	    }
	    $this->set('schedulecategory',$schedulecategory);
		
		if($this->request->is('post')){
			$data=$this->request->data;
			$data['Schedulecategory']['company_id']=$this->Session->read('company_id');
			$this->Schedulecategory->Save($data);
			$this->Session->setFlash('Schedulecategory Registered.');
			$this->redirect(array('action'=>'index'));
		}
    }
	public function edit($id = null) {
		$this->Schedulecategory->id = $id;
		if ($this->request->is('post') || $this->request->is('put')) {
			$data=$this->request->data;
			$data['Schedulecategory']['company_id']=$this->Session->read('company_id');
			if ($this->Schedulecategory->save($data)) {
				$this->Session->setFlash('The Schedulecategory has been updated');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The Schedulecategory could not be update. Please, try again.');
			}
		}else{
		$res = $this->Schedulecategory->read();	
		$this->request->data=$res;
		}
	}
	public function delete($id = null) {
	$this->Schedulecategory->id = $id;
	if ($this->Schedulecategory->delete()) {
			$this->Session->setFlash(__('Schedulecategory deleted'));
			$this->redirect(array('action'=>'index'));
		}
	}
	function ajax_data(){
		$status=$_POST['status'];
		if($status!=""){
			$res=$this->set('options', $this->Schedulecategory->find('all', array(
												'conditions'=>array(
													'Schedulecategory.status'=>$status
												))));
			}
		if($status==""){
			$res=$this->set('options', $this->Schedulecategory->find('all'));
			}
		$this->layout="ajax";
	}
	public function load_page($id){
	$val=($id*2).",3";
	$this->set('options',$this->Schedulecategory->find('all',array('limit'=>$val)));
	$this->layout="ajax";
	}
}
?>