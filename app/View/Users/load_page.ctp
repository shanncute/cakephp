	<tr>
		<th>S.No</th>
		<th>Name</th>
		<th>Designation</th>
		<th>Email</th>
		<th>Department</th>
		<th>User Group</th>
		<th>Edit</th>
		<th>Status</th>
		<th>Delete</th>
	</tr>
	<?php
	$i=1;
	foreach($options as $option):
	echo "<tr>";
		echo "<td>".$i."</td>";
		echo "<td>".$option['User']['first_name']."</td>";
		echo "<td>".$option['User']['designation']."</td>";
		echo "<td>".$option['User']['email']."</td>";
		echo "<td>".$option['Department']['department_name']."</td>";
		echo "<td>".$option['User']['user_group']."</td>";
		echo "<td>".$this->Html->Link('edit',array('action'=>'edit',$option['User']['id']))."</td>";
		if($option['User']['status']==1){
		echo "<td>Active</td>";
		}else{
		echo "<td>InActive</td>";
		}
		
		echo "<td>".$this->Form->postLink(__('Delete'), array('action' => 'delete', $option['User']['id']), null, __('Are you sure you want to delete %s?', $option['User']['id']))."</td>";
		
	echo "</tr>";
	$i++;
	endforeach;
	?>