<?php
class CompaniesController extends AppController {

public $name = 'Companies';
public $paginate = array('limit' =>3);

	
	public function index(){
		$this->set('options',$this->Company->find('all'));	
		//pr($this->Company->find('all'));
	}
	public function add() {
	
		 $attributeList = Set::extract('/Attribute/name',$this->Company->getAttributes());
		$company = array('Company' => array());
		foreach($attributeList as $key=> $value) {
	        //debug($value[]);
	        $company['Company'][$value] = null; 
	    }
	    $this->set('company',$company);
		
		if ($this->request->is('post')) {
		$data=$this->request->data;
	
		$data['Company']['password']=base64_encode($data['Company']['password']);
            if ($this->Company->save($data)) {
                $this->Session->setFlash('Your records has been saved.');
                $this->redirect(array('action' => 'index'));
            } else {
               $this->Session->setFlash('The Company could not be saved. Please, try again.');
            }
        }
    }
	function view($id = null) {
	    $this->Company->recursive = 1;
	    $Company = $this->Company->findById($id,array('contain' => false));
		//pr($Company);
	    $this->set('options',$Company);
	}
	public function edit($id = null) {
		$this->Company->id = $id;
		
		if ($this->request->is('post') || $this->request->is('put')) {
			$data=$this->request->data;
			$data['Company']['password']=base64_encode($data['Company']['password']);
			if ($this->Company->save($data)) {
				$this->Session->setFlash('The user has been updated');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The user could not be update. Please, try again.');
			}
		}else{
		$res = $this->Company->read();	
		$this->request->data=$res;
		}
	}
	public function delete($id = null) {
		$this->Company->id = $id;
		if ($this->Company->delete()) {
			$this->Session->setFlash(__('Company deleted'));
			$this->redirect(array('action'=>'index'));
		}
	}
	
	public function logout(){
	   $this->Session->destroy();
	   $this->redirect(array('action'=>'index'));
	}
	
}
?>