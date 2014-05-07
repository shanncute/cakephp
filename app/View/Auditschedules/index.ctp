
<!-- Header Links start -->

<div align="right">
	<?php echo "Welcome <b>".$this->Session->read('User')."<b>";?>&nbsp;&nbsp;
	<?php echo $this->Html->link('add new Auditschedule',array('action'=>'add')); ?>&nbsp;&nbsp;
	<?php echo $this->Html->link('Logout',array('controller'=>'Users','action'=>'logout')); ?>
</div>
<!-- Header Links end -->


<!-- Auditschedule Lists start -->

<table align="center" id="Auditschedule" border="2" >
	<tr>
		<td>Schedule type</td>
		<td>Schedule title</td>
		<td>Date & Time</td>
		<td>Auditor</td>
		<td>Auditee</td>
		<td>Meeting room</td>
		<td>Status</td>
		<td>Update</td>
		<td>Reschedule</td>
	</tr>
	<?php
	$i=1;
	foreach ($options as $option):
	echo "<tr>";
		echo "<td>SDLC audit</td>";
		echo "<td>".$option['Schedulecategory']['schedulecategory_name']."</td>";
		echo "<td>".$option['Auditschedule']['audit_datetime']."</td>";
		echo "<td>".$option['Auditschedule']['auditor']."</td>";
		echo "<td>".$option['Auditschedule']['auditee']."</td>";
		echo "<td>".$option['Meetingroom']['meetingroom_name']."</td>";
		if($option['Auditschedule']['status']=="1"){
		echo "<td>Assigned</td>";
		}else{
		echo "<td>Unassigned</td>";
		}
		echo "<td>".$this->Html->link('click here',array('action'=>'edit',$option['Auditschedule']['id']))."</td>";
		echo "<td>".$this->Html->link('click here',array('action'=>'edit',$option['Auditschedule']['id']))."</td>";
		
	echo "</tr>";
	$i++;
	endforeach;
	?>
</table>
<!-- Auditschedule Lists end -->

<!-- Pagination start -->

<?php 
	echo "Page : ".$this->Paginator->numbers();
	echo "&nbsp&nbsp&nbsp&nbsp";
	//echo "Page : ".$this->Paginator->counter(); 
	?>
<!-- Pagination end -->

<script>

//Script for filter Auditschedule using Auditschedule name

function load_Auditschedule(){
	var status=$("#status").val();
	$.ajax({
	url:"Auditschedules/ajax_data/",
	data: { status: status },
	type:"POST",
	success:function(data) {
	$("#Auditschedule").html(data);
	}
	});
}
</script>