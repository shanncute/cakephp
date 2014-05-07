<?php
class ArticlesController extends AppController {

public $name = 'Articles';
public $paginate = array('limit' => 2);

	public function index(){
			$company_id=$this->Session->read('company_id');
			if ($this->request->is('post')) {
			
			$search=$this->request->data['Article']['name'];
			$cond=array("Article.article_name LIKE '%$search%'","Article.company_id"=>$company_id );
			$this->set('options', $this->paginate('Article',$cond));
			}else{
			$cond=array("Article.company_id"=>$company_id );
			$this->set('options',$this->paginate('Article',$cond));
			}
		
		
		/*$this->loadModel('Usergroup'); /* Get data from usergroups table and load it in department name combo
		$usergroup = $this->Usergroup->find('list',array(
		'conditions' => array(), 
		'fields' => array('usergroup_name'))); 
		
		$this->set('usergroups',$usergroup);
		
		$this->loadModel('User');
		$User = $this->User->find('list',array(
		'conditions' => array(), 
		'fields' => array('email','first_name'))); 
		
		$this->set('User',$User);
		if($this->request->is('post')){
		//pr($this->request->data);
		//exit;
		$res=$this->request->data;
		$mail=$res['Article']['email'];
		$msg="<a href='#'>Click here to aproval</a>";
		if($mail!=""){
			   App::uses('CakeEmail', 'Network/Email');
               $email = new CakeEmail();
//			   $email->setHeaders(array('Content-type'=> 'text/html; charset=iso-8859-1' ));
			  $email->emailFormat('html');
               $email->from(array('sankar.k@angleritech.com' => 'Article aproval'));
               $email->to($mail);
               $email->subject('Click to aproval');
               $email->send("$msg");
			
			   $this->Session->setFlash('Email sent successfully');

			   //$this->Cart->query("delete  FROM Carts;");
			   $this->redirect(array('action' => 'index'));
			   

			}
		}*/
	}
	public function add(){
		$this->loadModel('User'); /* Get data from departments table and load it in department name combo*/
		$options = $this->User->find('list',array(
		'conditions' => array(), 
		'fields' => array('first_name'))); 
		$this->set('options',$options);
		
		$this->loadModel('Usergroup'); /* Get data from usergroups table and load it in department name combo*/
		$Usergroup = $this->Usergroup->find('list',array(
		'conditions' => array(), 
		'fields' => array('usergroup_name'))); 
		$this->set('Usergroup',$Usergroup);
		
		 $attributeList = Set::extract('/Attribute/name',$this->Article->getAttributes());
		$article = array('Article' => array());
		foreach($attributeList as $key=> $value) {
	        //debug($value[]);
	        $article['Article'][$value] = null; 
	    }
		//pr($article);
	    $this->set('article',$article);
		
		if($this->request->is('post')){
		$data=$this->request->data;
		$data['Article']['company_id']=$this->Session->read('company_id');
		//pr($data);
		//exit;
		$tmp_name=$data['Article']['upload_file']['tmp_name'];
		$file_name=$data['Article']['upload_file']['name'];
		move_uploaded_file($tmp_name,'img/article_images/'.$file_name);
		$data['Article']['upload_file']=$data['Article']['upload_file']['name'];
		//pr($data);
		//exit;
		$this->Article->Save($data);
		$this->Session->setFlash('Article Added.');
		//$this->redirect(array('action'=>'index'));
		}
    }
	public function edit($id = null) {
		$this->Article->id = $id;
		$this->loadModel('User'); /* Get data from departments table and load it in department name combo*/
		$options = $this->User->find('list',array(
		'conditions' => array(), 
		'fields' => array('first_name'))); 
		$this->set('options',$options);
		
		$this->loadModel('Usergroup'); /* Get data from usergroups table and load it in department name combo*/
		$Usergroup = $this->Usergroup->find('list',array(
		'conditions' => array(), 
		'fields' => array('usergroup_name'))); 
		$this->set('Usergroup',$Usergroup);
		
		if ($this->request->is('post') || $this->request->is('put')) {
			$data=$this->request->data;
			$data['Article']['company_id']=$this->Session->read('company_id');
			$tmp_name=$data['Article']['upload_file']['tmp_name'];
			$file_name=$data['Article']['upload_file']['name'];
			move_uploaded_file($tmp_name,'img/article_images/'.$file_name);
			$data['Article']['upload_file']=$data['Article']['upload_file']['name'];
			
			if ($this->Article->save($data)) {
				$this->Session->setFlash('The Article has been updated');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The Article could not be update. Please, try again.');
			}
		}else{
		$res = $this->Article->read();	
		$this->request->data=$res;
		}
	}
	public function delete($id = null) {
	$this->Article->id = $id;
	if ($this->Article->delete()) {
			$this->Session->setFlash(__('Article deleted'));
			$this->redirect(array('action'=>'index'));
		}
	}
	function ajax_data(){
		$status=$_POST['status'];
		if($status!=""){
			$res=$this->set('options', $this->Article->find('all', array(
												'conditions'=>array(
													'Article.status'=>$status
												))));
			}
		if($status==""){
			$res=$this->set('options', $this->Article->find('all'));
			}
		$this->layout="ajax";
	}
	public function load_page($id){
	$val=($id*2).",3";
	$this->set('options',$this->Article->find('all',array('limit'=>$val)));
	$this->layout="ajax";
	}
	public function view($id = null){
	$this->Article->id=$id;
	$this->set('res',$this->Article->read());
	}
	function user_data(){
		$user_id=$_POST['id'];
		$this->loadModel('User'); /* Get data from User table and load it in department name combo*/
		$res=$this->set('user',$this->User->find('list',array(
		'conditions' => array('id'=>$user_id), 
		'fields' => array('first_name'))));
		$this->layout="ajax";
	}
}
?>