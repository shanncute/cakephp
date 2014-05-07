<?php
class OrderlinesController extends AppController {

public $name = 'Orderlines';
public $Helpers=array('session');
	public function index($id=null){
			
		$this->set('b',$id);
		$this->Orderline->find('all');
		if($this->request->is('post')){
		$data=$this->request->data;
		$i=0;
		$val=array();
		$data['material_no']=array_filter($data['material_no']);
		foreach ($data['material_no'] as $res){
		$val['material_no']=$data['material_no'][$i];
		$val['article_ticket']=$data['article_ticket'][$i];
		$val['brand']=$data['brand'][$i];
		$val['ticket']=$data['ticket'][$i];
		$val['shade_code']=$data['shade_code'][$i];
		$val['Length']=$data['Length'][$i];
		$val['quality']=$data['quality'][$i];
		$this->Orderline->SaveAll($val);	
		$i++;
		}
		$this->Session->setFlash('Orderline data saved.');
		}
	}
       
}
          
 

?>