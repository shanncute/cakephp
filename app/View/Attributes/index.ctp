
<div align="right">
<?php echo $this->Html->link('home',array('controller'=>'companies','action'=>'index')); ?>&nbsp;&nbsp;
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
			<th><?php echo __('Field_name');?></th>
			<th><?php echo __('model');?></th>
			<th><?php  echo __('data_type');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($options as $res): 
	?>
	<tr>
		<td><?php echo $res['Attribute']['id']; ?>&nbsp;</td>
		<td><?php echo $res['Attribute']['name']; ?>&nbsp;</td>
		<td><?php echo $res['Attribute']['model']; ?>&nbsp;</td>
		<td><?php echo $res['Attribute']['data_type']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $res['Attribute']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $res['Attribute']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $res['Attribute']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $res['Attribute']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New field', true), array('action' => 'add')); ?></li>
	</ul>
</div>
