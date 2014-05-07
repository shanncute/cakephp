<div align="right"><?php echo $this->Html->link('Home',array('controller'=>'Users','action'=>'home')); ?></div>

<!-- Article add form start -->

<div>
<?php
	//$date=date('d-m-Y');
	echo $this->Form->create('Article', array('type' => 'file'));
	echo $this->Form->input('article_name');
	echo $this->Form->input('keywords');
	echo $this->Form->input('keywords_description');
	echo $this->Form->input('author_id',array('type' => 'select', 'options' => $options,'label' => 'Author'));
	echo $this->Form->input('date_of_posting');
	echo $this->Form->input('article_description');

	echo $this->Form->input('upload_file',array('type'=>'file'));
	echo $this->Form->input('usergroup_id',array('type' => 'select', 'options' => $Usergroup,'label' => 'Aproval authority'));

		//debug($department);
				foreach ( $department['Department'] as $field => $value) :
				if (!is_array($value)) {
					$idField = false;
				if (substr($field,-3) == '_id') {
					$idField = true;
					$fieldName = Inflector::camelize(substr($field,0,strpos($field,'_id')));
				} else {
					$fieldName = Inflector::camelize($field);
				}
			//debug($field);
			if ($field != 'created' && $field != 'modified') {
			echo $this->Form->input($field);
			}
			}
			endforeach;
			
	echo $this->Form->Submit('Submit');
?>
</div>

<!-- Department add form end -->