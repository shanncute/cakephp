<div align="right"><?php echo $this->Html->link('Home',array('controller'=>'Users','action'=>'home')); ?></div>

<!-- Usergroup edit form start -->

<div>
<?php
	echo $this->Form->create('Usergroup');
	echo $this->Form->input('usergroup_name');
	$attributes  = array('legend' => false, 'default'=>'0');
	$options = array('1' => 'Active', '0' => 'Inactive');
	echo $this->Form->radio('status', $options, $attributes);

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
<!-- Usergroup edit form end -->