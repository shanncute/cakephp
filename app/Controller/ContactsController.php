<?php
class ContactsController extends AppController {

	var $name = 'Contacts';
	var $scaffold;
	function index() {
	    //$this->Contact->recursive = 2;
	    $this->set('contacts',$this->Contact->find('all'));
	    //$this->set('contacts',$this->paginate('Contact'));
		$cond="";
		if (!empty($this->data)) {
			$search=$this->data['Contact']['Search'];
			
			$cond=array('OR'=>array("Contact.name LIKE '%$search%'"));	
			
		}
		if($cond!=""){
		pr($this->Contact->find($cond));
		//exit;
		$this->set('contacts',$this->Contact->find($cond));
		}
	}
	function view($id = null) {
	    $this->Contact->recursive = 2;
	    $contact = $this->Contact->findById($id,array('contain' => false));
	    //debug($this->Contact->find('all', array(
	    //    'conditions' => array('city' => 'San Rafael'))));
	    //$contact = $this->Contact->find('first', array(
	    //    'conditions' => array('city' => 'San Rafael')));
	    //$contact = $this->Contact->find('first', array(
	    //    'conditions' => array('Attribute.city' => 'San Rafael')));
	    //debug($contact);
	    $this->set('contact',$contact);
	}
	function edit($id = null) {
	 $this->Contact->recursive = 2;
	 $this->Contact->id = $id;
		
		if ($this->request->is('post') || $this->request->is('put')) {
			$res=$this->request->data;
			$res['Contact']['id']=$id;
			
			if ($this->Contact->save($res)) {
				//pr($res);
			debug($res);
			exit;
			$this->Session->setFlash('The user has been updated');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The user could not be update. Please, try again.');
			}
		}else{
		$res = $this->Contact->read();	
		$this->request->data=$res;
		}
	}

		function add() {
	    $this->Contact->recursive = 2;
		$this->Contact->create();
		//$res=$this->Contact->getAttributes();
		//pr($res[0]['Attribute']['model']);
	    $attributeList = Set::extract('/Attribute/name',$this->Contact->getAttributes());
		$contact = array('Contact' => array());
		foreach($attributeList as $key=> $value) {
	        //debug($value[]);
	        $contact['Contact'][$value] = null; 
	    }
	    $this->set('contact',$contact);
		
		
	    if (!empty($this->data)) {
		$lead_id =$this->Contact->query("SELECT MAX(id) FROM contacts");
		$id=$lead_id[0][0]['MAX(id)'];
		if($id!=""){
		$this->data['Contact']['id']=$id+1;
		}else{
		$this->data['Contact']['id'] = 1;
		}   
	      //debug($this->data);
		  //exit;
	        if($this->Contact->save($this->data))
	            $this->Session->setFlash(__('The Contact has been saved',true));
				$this->redirect(array('action' => 'index'));
	    }
	}
	
	function find_replace() {
	    debug($this->Contact->findReplace('Mateo','Carlos',null));
	    
	}
}
