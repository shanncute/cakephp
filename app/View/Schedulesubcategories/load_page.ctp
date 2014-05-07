
	<tr>
		<th>Schedulesubcategory Name</th>
		<th>Schedule type</th>
		<th>Edit</th>
		<th>Status</th>
		<th>Delete</th>
	</tr>
	<?php
	$i=1;
	foreach ($options as $option):
	echo "<tr>";
		echo "<td>".$option['Schedulesubcategory']['schedulesubcategory_name']."</td>";
		if($option['Schedulesubcategory']['schedule_type']==1){
		echo "<td>Audit</td>";
		}else{
		echo "<td>Others</td>";
		}
		echo "<td>".$this->Html->link('edit',array('action'=>'edit',$option['Schedulesubcategory']['id']))."</td>";
		if($option['Schedulesubcategory']['status']==1){
		echo "<td>Active</td>";
		}else{
		echo "<td>InActive</td>";
		}
		echo "<td>".$this->Form->postLink(__('Delete'), array('action' => 'delete', $option['Schedulesubcategory']['id']), null, __('Are you sure you want to delete %s?', $option['Schedulesubcategory']['id']))."</td>";
	echo "</tr>";
	$i++;
	endforeach;
	?>
