
<div align="right">
<?php echo $this->Html->link('Logout',array('controller'=>'Users','action'=>'logout')); ?>
</div>
<div>
<!-- Search Form Start -->
<!-- 
<?php 	echo $this->Form->create();?>

<table id="book_search">
	<tr>
		<td><?php echo $this->Form->input('Search',array('label'=>'Search by name','style'=>'width:300px;'));?></td>
		<td><?php echo $this->Form->end('Go!'); ?></td>
	</tr>
</table>
-->
<!-- Search Form End -->

	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo __('id');?></th>
			<th><?php echo __('company_name');?></th>
			<th><?php echo __('domain_name');?></th>
			<th><?php  echo __('Users');?></th>
			<th><?php  echo __('Available Users');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($options as $res): 
	?>
	<tr>
		<td><?php echo $res['Company']['id']; ?>&nbsp;</td>
		<td><?php echo $res['Company']['company_name']; ?>&nbsp;</td>
		<td><?php echo $res['Company']['domain_name']; ?>&nbsp;</td>
		<td ><?php echo count($res['User']); ?>&nbsp;</td>
		<td><?php echo $res['Company']['maximum_users']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $res['Company']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $res['Company']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $res['Company']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $res['Company']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New company', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Manage fields', true), array('controller'=>'Attributes','action' => 'index')); ?></li>
	</ul>
</div>
