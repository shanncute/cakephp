	
	<tr>
		<th>Auditchecklist Name</th>
		<th>Department Name</th>
		<th>Schedulecategory Name</th>
		<th>Process Name</th>
		<th>Edit</th>
		<th>Status</th>
		<th>Delete</th>
	</tr>
	<?php
	$i=1;
	foreach ($options as $option):
	echo "<tr>";
		echo "<td>".$option['Auditchecklist']['auditchecklist_name']."</td>";
		echo "<td>".$option['Department']['department_name']."</td>";
		echo "<td>".$option['Schedulecategory']['schedulecategory_name']."</td>";
		echo "<td>".$option['Process']['process_name']."</td>";
		echo "<td>".$this->Html->link('edit',array('action'=>'edit',$option['Auditchecklist']['id']))."</td>";
		if($option['Auditchecklist']['status']==1){
		echo "<td>Active</td>";
		}else{
		echo "<td>InActive</td>";
		}
		echo "<td>".$this->Form->postLink(__('Delete'), array('action' => 'delete', $option['Auditchecklist']['id']), null, __('Are you sure you want to delete %s?', $option['Auditchecklist']['id']))."</td>";
	echo "</tr>";
	$i++;
	endforeach;
	?>