<div align="right"><?php echo $this->Html->link('Back to Login',array('controller'=>'Users','action'=>'index')); ?></div>

<!-- Forget password Form start -->

<div>
<?php
echo $this->Form->create('User');
echo $this->Form->input('username');
echo $this->Form->end('Send mail');
?>
</div>

<!-- Forget password end -->