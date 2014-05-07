<tr>
		<th>Meetingroom Name</th>
		<th>Meetingroom Description</th>
		<th>Edit</th>
		<th>Status</th>
		<th>Delete</th>
	</tr>
	<?php
	$i=1;
	foreach ($options as $option):
	echo "<tr>";
		echo "<td>".$option['Meetingroom']['meetingroom_name']."</td>";
		echo "<td>".$option['Meetingroom']['meetingroom_description']."</td>";
		echo "<td>".$this->Html->link('edit',array('action'=>'edit',$option['Meetingroom']['id']))."</td>";
		if($option['Meetingroom']['status']==1){
		echo "<td>Active</td>";
		}else{
		echo "<td>InActive</td>";
		}
		echo "<td>".$this->Form->postLink(__('Delete'), array('action' => 'delete', $option['Meetingroom']['id']), null, __('Are you sure you want to delete %s?', $option['Meetingroom']['id']))."</td>";
	echo "</tr>";
	$i++;
	endforeach;
	?>