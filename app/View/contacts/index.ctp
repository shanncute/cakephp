<div class="contacts index">
	<h2><?php __('Contacts');?></h2>
	
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
			<th><?php echo __('name');?></th>
			<th><?php echo __('address');?></th>
			<th><?php echo __('email');?></th>
			<th><?php echo __('created');?></th>
			<th><?php echo __('modified');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($contacts as $res): ?>
	<tr>
		<td><?php echo $res['Contact']['id']; ?>&nbsp;</td>
		<td><?php echo $res['Contact']['name']; ?>&nbsp;</td>
		<td><?php echo $res['Contact']['contact_address']; ?>&nbsp;</td>
		<td><?php echo $res['Contact']['contact_email']; ?>&nbsp;</td>
		<td><?php echo $res['Contact']['created']; ?>&nbsp;</td>
		<td><?php echo $res['Contact']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $res['Contact']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $res['Contact']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $res['Contact']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $res['Contact']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Contact', true), array('action' => 'add')); ?></li>
	</ul>
</div>
