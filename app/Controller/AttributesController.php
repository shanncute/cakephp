<?php
class AttributesController extends AppController {

public $name = 'Attributes';
public $paginate = array('limit' =>20);
	public function index(){
		$this->set('count',$this->Attribute->find('count'));
		if ($this->request->is('post')) {
			$search=$this->request->data['Attribute']['name'];
			$cond=array("Attribute.Attribute_name LIKE '%$search%'" );
			$this->set('options', $this->paginate('Attribute',$cond));
			}else{
			$this->set('options', $this->paginate('Attribute'));
			}
	}
	public function add(){
		
		if($this->request->is('post')){
			$data=$this->request->data;
			$data['Attribute']['name']=$data['Attribute']['model']."_".$data['Attribute']['name'];
			//pr($data);
			//exit;
			$this->Attribute->Save($data);
			$this->Session->setFlash('Attribute Registered.');
			$this->redirect(array('action'=>'index'));
		}
    }
	public function edit($id = null) {
		$this->Attribute->id = $id;
		if ($this->request->is('post') || $this->request->is('put')) {
			$data=$this->request->data;
			$data['Attribute']['name']=$data['Attribute']['model']."_".$data['Attribute']['name'];
			if ($this->Attribute->save($data)) {
				$this->Session->setFlash('The Attribute has been updated');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The Attribute could not be update. Please, try again.');
			}
		}else{
		$res = $this->Attribute->read();	
		
		$array = explode("_",$res['Attribute']['name']);
		$res['Attribute']['name']=$array[1];
		pr($res);
		$this->request->data=$res;
		}
	}
	public function delete($id = null) {
	$this->Attribute->id = $id;
	if ($this->Attribute->delete()) {
			$this->Session->setFlash(__('Attribute deleted'));
			$this->redirect(array('action'=>'index'));
		}
	}
	function view($id = null) {
	    $this->Attribute->recursive = 2;
	    $Attribute = $this->Attribute->findById($id,array('contain' => false));
	    $this->set('options',$Attribute);
	}
}
?>