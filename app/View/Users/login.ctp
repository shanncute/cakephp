<?php echo $this->Session->flash('auth'); ?>
<div align="right">
<?php 
echo $this->Html->link('Sign up new user',array('controller'=>'Users','action'=>'add')); 
echo "&nbsp;&nbsp;".$this->Html->link('Register your company',array('controller'=>'Companies','action'=>'add'));
?>
</div>

<!-- Login Form start -->

<div>
<?php
echo $this->Form->create('User');
echo $this->Form->input('username');
echo $this->Form->input('password');
echo $this->Form->Submit('Submit');
?>
</div>
<!-- Login Form end -->

<div align="left"><?php echo $this->Html->link('Forget Password?',array('controller'=>'Users','action'=>'forget_password')); ?></div>
