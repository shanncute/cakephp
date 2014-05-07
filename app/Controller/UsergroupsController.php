<?php
class UsergroupsController extends AppController {

public $name = 'Usergroups';
public $paginate = array('limit' =>3);

	public function index(){
		$this->set('count',$this->Usergroup->find('count'));
		if ($this->request->is('post')) {
			
			$search=$this->request->data['Usergroup']['name'];
			$cond=array("Usergroup.usergroup_name LIKE '%$search%'" );
			$this->set('options', $this->paginate('Usergroup',$cond));
			}else{
			$cond=array("Usergroup.company_id"=>$this->Session->read('company_id') );
			$this->set('options', $this->paginate('Usergroup',$cond));
			}
		
	}
	public function add(){
	
		 $attributeList = Set::extract('/Attribute/name',$this->Usergroup->getAttributes());
		$usergroup = array('Usergroup' => array());
		foreach($attributeList as $key=> $value) {
	        //debug($value[]);
	        $usergroup['Usergroup'][$value] = null; 
	    }
	    $this->set('usergroup',$usergroup);
		
		$this->loadModel('Department'); /* Get data from departments table and load it in department name combo*/
		$dept = $this->Department->find('list',array(
		'conditions' => array(), 
		'fields' => array('department_name'))); 
		$this->set('dept',$dept);
		if($this->request->is('post')){
			$data=$this->request->data;
			$data['Usergroup']['company_id']=$this->Session->read('company_id');
			$this->Usergroup->Save($data);
			$this->Session->setFlash('Usergroup Registered.');
			$this->redirect(array('action'=>'index'));
		}
    }
	public function edit($id = null) {
		$this->Usergroup->id = $id;
		if ($this->request->is('post') || $this->request->is('put')) {
			$data=$this->request->data;
			$data['Usergroup']['company_id']=$this->Session->read('company_id');
			if ($this->Usergroup->save($data)) {
				$this->Session->setFlash('The Usergroup has been updated');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The Usergroup could not be update. Please, try again.');
			}
		}else{
		$res = $this->Usergroup->read();	
		$this->request->data=$res;
		}
	}
	public function delete($id = null) {
	$this->Usergroup->id = $id;
	if ($this->Usergroup->delete()) {
			$this->Session->setFlash(__('Usergroup deleted'));
			$this->redirect(array('action'=>'index'));
		}
	}
	function ajax_data(){
		$status=$_POST['status'];
		if($status!=""){
			$res=$this->set('options', $this->Usergroup->find('all', array(
												'conditions'=>array(
													'Usergroup.status'=>$status
												))));
			}
		if($status==""){
			$res=$this->set('options', $this->Usergroup->find('all'));
			}
		$this->layout="ajax";
	}
	public function load_page($id){
	$val=($id*2).",3";
	$this->set('options',$this->Usergroup->find('all',array('limit'=>$val)));
	$this->layout="ajax";
	}
}
?>