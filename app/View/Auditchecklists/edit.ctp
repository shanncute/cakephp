<div align="right"><?php echo $this->Html->link('Home',array('controller'=>'Users','action'=>'home')); ?></div>

<!-- Auditchecklist add form start -->

<div>
<?php
	echo $this->Form->create('Auditchecklist');
	echo $this->Form->input('department_id',array('type' => 'select', 'options' => $dept,'label' => 'department name'));
	
	echo $this->Form->input('schedulecategory_id',array('type' => 'select',  'options' => $options,'label' => 'schedulecategory name'));
	
	echo $this->Form->input('process_id',array('type' => 'select',  'options' => $process,'label' => 'process name'));
	
	echo $this->Form->input('auditchecklist_name');
	$attributes  = array('legend' => false, 'default'=>'1');
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

<!-- Auditchecklist add form end -->