<div align="right"><?php echo $this->Html->link('Home',array('controller'=>'Users','action'=>'home')); ?></div>

<!-- Change password Form start -->

<div>
<?php
echo $this->Form->create('User');
echo $this->Form->input('old_password');
echo $this->Form->input('password',array('label'=>'new password'));
echo $this->Form->input('confirm_password', array('type'=>'password'));
echo $this->Form->end('Register');
?>
</div>
<!-- Change password Form end -->