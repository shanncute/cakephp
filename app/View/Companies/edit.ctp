<div>
<?php echo $this->Form->create('Company',array('method'=>'post'));?>
	<fieldset>
		<legend><?php __('Edit company'); ?></legend>
	<?php
		echo $this->Form->create('Company');
		echo $this->Form->input('company_name');
		echo $this->Form->input('domain_name');
		echo $this->Form->input('maximum_users');
		echo $this->Form->input('username');
		echo $this->Form->input('password');
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
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Company.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Company.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Company', true), array('action' => 'index'));?></li>
	</ul>
</div>