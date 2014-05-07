<?php echo $this->Html->link('Add new action',array('action'=>'add')); ?>
<table border="1">
    <tr>
        <td>S.No</td>
        <td>Action Name</td>
        <td>Action Type</td>
        <!--<td>Edit</td>-->
    </tr>
    <?php
	$i=1;
	foreach ($options as $option):
	echo "<tr>";
		echo "<td>".$i."</td>";
		echo "<td>".$option['Action']['action_name']."</td>";
		echo "<td>".$option['Action']['action_type']."</td>";
		//echo "<td>".$this->Html->link('edit',array('action'=>'edit',$option['Action']['id']))."</td>";
	echo "</tr>";
	$i++;
	endforeach;
	?>
</table>