<div align="right"><?php echo $this->Html->link('Home',array('controller'=>'Users','action'=>'home')); ?></div>

<!-- Auditchecklist add form start -->

<div>
<?php
	echo $this->Form->create('Auditchecklist');
	echo $this->Form->input('department_id',array('type' => 'select', 'empty' => __('Select'), 'options' => $dept,'label' => 'department name'));
	
	echo $this->Form->input('schedulecategory_id',array('type' => 'select', 'empty' => __('Select'), 'options' => $options,'label' => 'schedulecategory name'));
	
	echo $this->Form->input('process_id',array('type' => 'select', 'empty' => __('Select'), 'options' => $process,'label' => 'process name'));
	
	echo $this->Form->input('auditchecklist_name');
	$attributes  = array('legend' => false, 'default'=>'1');
	$options = array('1' => 'Active', '0' => 'Inactive');
	echo $this->Form->radio('status', $options, $attributes);
	?>
<?php
			//debug($auditchecklist);
            foreach ( $auditchecklist['Auditchecklist'] as $field => $value) :
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
    ?>
	<?php echo $this->Form->end(__('Submit', true));?>
</div>

<!-- Auditchecklist add form end -->