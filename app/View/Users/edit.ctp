<div align="right"><?php echo $this->Html->link('Back to Login',array('controller'=>'Users','action'=>'index')); ?></div>

<!-- Register Form start -->

<div>
<?php
echo $this->Form->create('User');
echo $this->Form->input('title');
echo $this->Form->input('first_name');
echo $this->Form->input('last_name');
echo $this->Form->input('designation');
?>
<div style="float:left;width:56%;position:relative;">
<?php
echo $this->Form->input('username');
?>
</div>
<div style="width: 40%;float: right; margin-top: -60px;"">
<?php
echo $this->Form->input('domain',array('type' => 'select', 'options' => $Company,'label' => 'domain'));
?>
</div>
<?php
echo $this->Form->input('password');
echo $this->Form->input('confirm_password', array('type'=>'password'));
echo $this->Form->input('department_id',array('type' => 'select',  'options' => $options,'label' => 'department name'));
echo $this->Form->input('usergroup_id',array('type' => 'select', 'options' => $usergroup,'label' => 'usergroup name'));
$attributes  = array('legend' => false, 'default'=>'0');
$options = array('1' => 'Active', '0' => 'Inactive');
echo $this->Form->radio('status', $options, $attributes);

echo $this->Form->end('Update');
?>
</div>
<!-- Register Form end -->