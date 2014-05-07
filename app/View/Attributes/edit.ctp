<div align="right">
<?php echo $this->Html->link('Home',array('controller'=>'Companies','action'=>'index')); ?>&nbsp;&nbsp;
</div>
<div>
<?php 
		echo $this->Form->create('Attribute');
		echo $this->Form->input('name');
		$m_options=array('Article','Auditchecklist','Auditschedule','Company','Contact','Department','Meetingroom','Process','Schedulecategory','Schedulesubcategory','Usergroup');
		
		$model_options=array_combine($m_options,$m_options);
		
		echo $this->Form->input('model',array('type'=>'select','options'=>$model_options));	
		
		$d_options=array('string','integer','binary','boolean','datetime','date','float','key','text','timestamp','time','uuid');
		$datatype_options=array_combine($d_options,$d_options);
		
		echo $this->Form->input('data_type',array('type'=>'select','options'=>$datatype_options));	
	?>
<?php echo $this->Form->end(__('Submit', true));?>
</div>