<tr>
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
		echo "<td>".$option['Schedulecategory']['schedulecategory_name']."</td>";
		echo "<td>".$option['Process']['process_name']."</td>";
		
		echo "<td>".$this->Html->link('edit',array('action'=>'edit',$option['Process']['id']))."</td>";
		if($option['Process']['status']==1){
		echo "<td>Active</td>";
		}else{
		echo "<td>InActive</td>";
		}
		echo "<td>".$this->Form->postLink(__('Delete'), array('action' => 'delete', $option['Process']['id']), null, __('Are you sure you want to delete %s?', $option['Process']['id']))."</td>";
	echo "</tr>";
	$i++;
	endforeach;
	?>