<div align="right"><?php echo $this->Html->link('Home',array('controller'=>'Users','action'=>'home')); ?></div>

<!-- Meetingroom add form start -->

<div>
<?php
	echo $this->Form->create('Meetingroom');
	
	echo $this->Form->input('meetingroom_name');
	echo $this->Form->input('meetingroom_description');
	$attributes  = array('legend' => false, 'default'=>'1');
	$options = array('1' => 'Active', '0' => 'Inactive');
	echo $this->Form->radio('status', $options, $attributes);
	?>
<?php
			//debug($meetingroom);
            foreach ( $meetingroom['Meetingroom'] as $field => $value) :
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

<!-- Meetingroom add form end -->