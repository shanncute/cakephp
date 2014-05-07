<?php
class AutomationController extends AppController {
   
    public function index(){
        $res=$this->Automation->find('all');
        $this->set('options',$res);
        //pr($res);
    }
    public function add(){
        $company_id=$this->Session->read('company_id');
        
        $this->loadModel('Action');
        $action_name=$this->Action->find('list',array('fields' => array('Action.id','Action.action_name')));
        $this->set('actions',$action_name);
        
        if ($this->request->is('post')){
            //pr($this->request->data);
            //exit;
            $res=$this->request->data;
            $res['Automation']['company_id']=$company_id;
            $this->Automation->save($res['Automation']);
            
            $automation_id=  $this->Automation->getLastInsertId();
            $res['Automationstep']['company_id']=$company_id;
            $res['Automationstep']['automation_id']=$automation_id;
            $this->loadModel('Automationstep');
            $this->Automationstep->save($res['Automationstep']);
            $this->Session->setFlash(__('Registered Successfully'));
            $this->redirect(array('action'=>'index'));
        }
      
      
    }
    

    public function edit($id = null){
        
        
    }
    
 }
?>