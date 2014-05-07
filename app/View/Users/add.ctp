<div align="right"><?php echo $this->Html->link('Back to Login',array('controller'=>'Users','action'=>'index')); ?></div>
<div id="usr" style="display:none;"><?php $this->Session->setFlash(__('Username already registered')); ?></div>
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
echo $this->Form->input('email_name',array('label'=>'Email'));
?>
</div>
<div style="width: 40%;float: right; margin-top: -60px;"">
<?php
echo $this->Form->input('domain',array('type' => 'select', 'empty' => __('Select'), 'options' => $Company,'label' => 'domain'));
?>
</div>
<?php
echo $this->Form->input('username',array('onblur'=>'chk_user(this.value)','id'=>'username'));
echo $this->Form->input('password');
echo $this->Form->input('confirm_password', array('type'=>'password'));
echo $this->Form->input('department_id',array('type' => 'select', 'empty' => __('Select'), 'options' => $options,'label' => 'department name'));
echo $this->Form->input('usergroup_id',array('type' => 'select', 'empty' => __('Select'), 'options' => $usergroup,'label' => 'usergroup name'));
//echo $this->Form->input('user_group');
$attributes  = array('legend' => false, 'default'=>'0');
$options = array('1' => 'Active', '0' => 'Inactive');
echo $this->Form->radio('status', $options, $attributes);
echo $this->Form->end('Register');
?>
</div>

<!-- Register Form end -->

<script>
function chk_user(val){
	$.ajax({
	url:"check_user",
	data: { value: val },
	type:"POST",
	success:function(data) {
	if(data==1){
	$("#username").val("");
	$("#username").focus();
	$("#usr").show();
	alert('Username already registered');
	}
	}
	});
}
</script>