<?php
class MeetingroomsController extends AppController {

public $name = 'Meetingrooms';
public $paginate = array('limit' =>3);

	public function index(){
		$this->set('count',$this->Meetingroom->find('count'));
		if ($this->request->is('post')) {
			
			$search=$this->request->data['Meetingroom']['name'];
			$cond=array("Meetingroom.meetingroom_name LIKE '%$search%'" );
			$this->set('options', $this->paginate('Meetingroom',$cond));
			}else{
			$cond=array("Meetingroom.company_id"=>$this->Session->read('company_id') );
			$this->set('options', $this->paginate('Meetingroom',$cond));
			}
	}
	public function add(){
		$this->Meetingroom->recursive = 2;
		$this->Meetingroom->create();
		$attributeList = Set::extract('/Attribute/name',$this->Meetingroom->getAttributes());
		$meetingroom = array('Meetingroom' => array());
		foreach($attributeList as $key=> $value) {
	        //debug($value[]);
	        $meetingroom['Meetingroom'][$value] = null; 
	    }
		//pr($meetingroom);
		//exit;
	    $this->set('meetingroom',$meetingroom);
		
		if($this->request->is('post')){
			$data=$this->request->data;
			$data['Meetingroom']['company_id']=$this->Session->read('company_id');
			$this->Meetingroom->Save($data);
			$this->Session->setFlash('Meetingroom Registered.');
			$this->redirect(array('action'=>'index'));
		}
    }
	public function edit($id = null) {
		
		$this->Meetingroom->id = $id;
		if ($this->request->is('post') || $this->request->is('put')) {
			$data=$this->request->data;
			$data['Meetingroom']['company_id']=$this->Session->read('company_id');
			if ($this->Meetingroom->save($data)) {
				$this->Session->setFlash('The Meetingroom has been updated');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The Meetingroom could not be update. Please, try again.');
			}
		}else{
		$res = $this->Meetingroom->read();	
		$this->request->data=$res;
		}
	}
	public function delete($id = null) {
	$this->Meetingroom->id = $id;
	if ($this->Meetingroom->delete()) {
			$this->Session->setFlash(__('Meetingroom deleted'));
			$this->redirect(array('action'=>'index'));
		}
	}
	function ajax_data(){
		$status=$_POST['status'];
		if($status!=""){
			$res=$this->set('options', $this->Meetingroom->find('all', array(
												'conditions'=>array(
													'Meetingroom.status'=>$status
												))));
			}
		if($status==""){
			$res=$this->set('options', $this->Meetingroom->find('all'));
			}
		$this->layout="ajax";
	}
	public function load_page($id){
	$val=($id*2).",3";
	$this->set('options',$this->Meetingroom->find('all',array('limit'=>$val)));
	$this->layout="ajax";
	}
}
?>