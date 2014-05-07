<div align="right"><?php echo $this->Html->link('Home',array('controller'=>'Users','action'=>'home')); ?></div>

<!-- Auditschedule add form start -->

<div>
<?php
	echo $this->Form->create('Auditschedule');
	echo $this->Form->input('department_id',array('options'=>$Department,'empty'=>'select'));
	echo $this->Form->input('schedulecategory_id',array('options'=>$Schedulecategory,'empty'=>'select'));
	echo $this->Form->input('schedulesubcategory_id',array('options'=>$Schedulesubcategory,'empty'=>'select'));
	echo $this->Form->input('auditor');
	echo $this->Form->input('supporting_auditor');
	echo $this->Form->input('auditee');
	echo $this->Form->input('supporting_auditee');
	echo $this->Form->input('organizer');
	echo $this->Form->input('project_name');
	echo $this->Form->input('process_id',array('options'=>$Process,'empty'=>'select'));
	echo $this->Form->input('audit_datetime');
	echo $this->Form->input('meetingroom_id',array('options'=>$Meetingroom,'empty'=>'select'));
	echo $this->Form->input('reschedule_approval_authority');
	echo $this->Form->input('status',array('options'=>array('Unassigned','Assigned'),'empty'=>'select'));
?>
<?php
			//debug($auditschedule);
            foreach ( $auditschedule['Auditschedule'] as $field => $value) :
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

<!-- Auditschedule add form end -->