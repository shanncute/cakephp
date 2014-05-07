
	<tr>
		<th>Usergroup Name</th>
		<th>Edit</th>
		<th>Status</th>
		<th>Delete</th>
	</tr>
	<?php
	foreach ($options as $option):
	echo "<tr>";
		echo "<td>".$option['Usergroup']['usergroup_name']."</td>";
		echo "<td>".$this->Html->link('edit',array('action'=>'edit',$option['Usergroup']['id']))."</td>";
		if($option['Usergroup']['status']==1){
		echo "<td>Active</td>";
		}else{
		echo "<td>InActive</td>";
		}
		echo "<td>".$this->Form->postLink(__('Delete'), array('action' => 'delete', $option['Usergroup']['id']), null, __('Are you sure you want to delete %s?', $option['Usergroup']['id']))."</td>";
	echo "</tr>";
	endforeach;
	?>
