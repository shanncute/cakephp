<?php
class ActionController extends AppController {
   
    public function index(){
        $this->set('options',$this->Action->find('all'));
        
    }
    public function add(){
        
        $company_id=$this->Session->read('company_id');
        
        /* Load used model names to module combo box */
        $Mod = App::objects('Model');
        $toremove = array('Action','Attribute','AppModel','Actionemail','Actionremovefield','Actionsetfield','Actionsql');
        $Mod=  array_diff($Mod,$toremove);
        $module=  array_combine($Mod, $Mod);
        $this->set('module',$module);
        
        $sender=array('Owner','Current User','Enter Sender Email');
        $sender_value=array('sankar.k@angleritech.com','san@san.com','1');
        $mail_sender=  array_combine( $sender_value,$sender);
        $this->set('mail_sender',$mail_sender);
        
        
        
       if ($this->request->is('post')){
            $res=$this->request->data;
            $selected=$res['Action']['action_type'];
            $table=$res['Action']['table'];
            $res['Action']['company_id']=$company_id;
            //$res['Action']['module']=$res[$table]['module'];
            //pr($res);
            //exit;
            /* Action master insert here*/
            $this->Action->Save($res['Action']);
            
            /* get action table insert id for assigning foreign key to actionsql,actionemail,actionset and removefield tables*/
            $action_id=  $this->Action->getLastInsertId();

            $res['actionemails']['To']=$res['actionemails']['owner_to']."','".$res['actionemails']['current_user_to']."','".$res['actionemails']['other_to'];
            $res['actionemails']['Cc']=$res['actionemails']['owner_cc']."','".$res['actionemails']['current_user_cc']."','".$res['actionemails']['other_cc'];
            $res['actionemails']['Bcc']=$res['actionemails']['owner_bcc']."','".$res['actionemails']['current_user_bcc']."','".$res['actionemails']['other_bcc'];
            if($res['actionemails']['mail_sender']=="1"){
                $res['actionemails']['mail_sender']=$res['actionemails']['mail_sender_other'];
            }     
           $res[$table]['company_id']=$company_id;
           $res[$table]['action_id']=$action_id;
           
           /* Insert execution for the respective selected action module sql,set,remove,email*/
           
           $this->loadModel($selected);
           $this->$selected->Save($res[$table]);
           $this->Session->setFlash(__('Registered Successfully'));
           $this->redirect(array('action'=>'index'));

        }
    }
    

    public function edit($id = null){
        $this->Action->id=$id;
       $company_id=$this->Session->read('company_id');
        if ($this->request->is('post') || $this->request->is('put')) {
            $res=  $this->request->data;
            $selected=$res['Action']['action_type'];
            $table=$res['Action']['table'];
            $res['Action']['company_id']=$company_id;
            
            /* Action master insert here*/
            $this->Action->Save($res['Action']);
            
            /* get action table insert id for assigning foreign key to actionsql,actionemail,actionset and removefield tables*/
            //$action_id=  $this->Action->getLastInsertId();

            $res['actionemails']['To']=$res['actionemails']['owner_to'].";".$res['actionemails']['current_user_to'].";".$res['actionemails']['other_to'];
            $res['actionemails']['Cc']=$res['actionemails']['owner_cc'].";".$res['actionemails']['current_user_cc'].";".$res['actionemails']['other_cc'];
            $res['actionemails']['Bcc']=$res['actionemails']['owner_bcc'].";".$res['actionemails']['current_user_bcc'].";".$res['actionemails']['other_bcc'];
            if($res['actionemails']['mail_sender']=="1"){
                $res['actionemails']['mail_sender']=$res['actionemails']['mail_sender_other'];
            }     
           $res[$table]['company_id']=$company_id;
           $res[$table]['action_id']=$id;
           
           /* Insert execution for the respective selected action module sql,set,remove,email*/
          // pr($res);
           $this->loadModel($selected);
           $this->$selected->Save($res[$table]);
           $this->Session->setFlash(__('updated Successfully'));
           $this->redirect(array('action'=>'index'));
        }else{
            $res = $this->Action->read();
            $this->request->data=$res;
            //pr($this->request->data);
            $company_id=$this->Session->read('company_id');
            /* Load used model names to module combo box */
            $Mod = App::objects('Model');
            $toremove = array('Action','Attribute','AppModel','Actionemail','Actionremovefield','Actionsetfield','Actionsql');
            $Mod=  array_diff($Mod,$toremove);
            $module=  array_combine($Mod, $Mod);
            $this->set('module',$module);

            $sender=array('Owner','Current User','Enter Sender Email');
            $sender_value=array('Owner','Current User','1');
            $mail_sender=  array_combine( $sender_value,$sender);
            $this->set('mail_sender',$mail_sender);
            
        }
        
    }
    
        /* Fields loaded by the corresponding module selection */
    
    public function load_field(){
        $this->layout="ajax";
        $module=$_POST['module'];
        $this->loadModel($module);
        $field_names= Set::extract('/COLUMNS/Field',$this->$module->query("DESCRIBE {$this->$module->useTable}"));
        $field=  array_combine($field_names, $field_names);
        $this->set(compact('field'));
    }
 }
?>