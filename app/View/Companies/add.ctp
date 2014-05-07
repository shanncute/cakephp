<div align="right">
<?php echo $this->Html->link('Home',array('controller'=>'Companies','action'=>'index')); ?>&nbsp;&nbsp;
</div>
<div>
<?php 
		echo $this->Form->create('Company');
		echo $this->Form->input('company_name');
		echo $this->Form->input('domain_name');
		echo $this->Form->input('maximum_users');
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		?>
<?php
			//debug($company);
            foreach ( $company['Company'] as $field => $value) :
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