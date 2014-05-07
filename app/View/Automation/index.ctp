<?php echo $this->Html->link('Add new automation',array('action'=>'add')); ?>
<table border="1">
    <tr>
        <td>S.No</td>
        <td>Automation Type</td>
        <td>Automation Name</td>
        <td>Module Name</td>
        <td>Run date</td>
        <td>Run time</td>
        <td>Repeat</td>
        <td>Until</td>
        <!--<td>Edit</td>-->
    </tr>
    <?php
	$i=1;
	foreach ($options as $option):
	echo "<tr>";
		echo "<td>".$i."</td>";
		echo "<td>".$option['Automation']['automation_type']."</td>";
		echo "<td>".$option['Automation']['automation_name']."</td>";
                echo "<td>".$option['Automation']['module']."</td>";
                echo "<td>".$option['Automation']['run_date']."</td>";
                echo "<td>".$option['Automation']['run_time']."</td>";
                if($option['Automation']['repeat']==0){
                echo "<td>Daily</td>";
                }else if($option['Automation']['repeat']==1){
                echo "<td>Weekly</td>";
                }else if($option['Automation']['repeat']==2){
                echo "<td>Monthly</td>";
                }else if($option['Automation']['repeat']==3){
                echo "<td>Yearly</td>";
                }else{
                    echo "<td>Not mentioned</td>";
                }
                
                echo "<td>".$option['Automation']['until']."</td>";
		//echo "<td>".$this->Html->link('edit',array('action'=>'edit',$option['Action']['id']))."</td>";
	echo "</tr>";
	$i++;
	endforeach;
	?>
</table>