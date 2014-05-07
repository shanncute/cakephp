
	<tr>
		<th>Department Name</th>
		<th>Edit</th>
		<th>Status</th>
		<th>Delete</th>
	</tr>
	<?php
	foreach ($options as $option):
	echo "<tr>";
		echo "<td>".$option['Department']['department_name']."</td>";
		echo "<td>".$this->Html->link('edit',array('action'=>'edit',$option['Department']['id']))."</td>";
		if($option['Department']['status']==1){
		echo "<td>Active</td>";
		}else{
		echo "<td>InActive</td>";
		}
		echo "<td>".$this->Form->postLink(__('Delete'), array('action' => 'delete', $option['Department']['id']), null, __('Are you sure you want to delete %s?', $option['Department']['id']))."</td>";
	echo "</tr>";
	endforeach;
	?>
