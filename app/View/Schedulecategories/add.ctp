<div align="right"><?php echo $this->Html->link('Home',array('controller'=>'Users','action'=>'home')); ?></div>

<!-- Schedulecategory add form start -->

<div>
<?php
	echo $this->Form->create('Schedulecategory');
	$type=array('audit','others');
	echo $this->Form->input('schedule_type',array('type' => 'select','empty' => __('Select'), 'options' => $type));
	echo $this->Form->input('schedulecategory_name');
	$attributes  = array('legend' => false, 'default'=>'1');
	$options = array('1' => 'Active', '0' => 'Inactive');
	echo $this->Form->radio('status', $options, $attributes);
	?>
<?php
			//debug($schedulecategory);
            foreach ( $schedulecategory['Schedulecategory'] as $field => $value) :
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

<!-- Schedulecategory add form end -->