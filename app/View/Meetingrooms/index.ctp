
<!-- Header Links start -->

<div align="right">
	<?php echo "Welcome <b>".$this->Session->read('User')."<b>";?>&nbsp;&nbsp;
	<?php echo $this->Html->link('add new Meetingroom',array('action'=>'add')); ?>&nbsp;&nbsp;
	<?php echo $this->Html->link('Logout',array('controller'=>'Users','action'=>'logout')); ?>
</div>
<!-- Header Links end -->

<!-- Filters using Status, Meetingroom name -->

<?php 
$status=array('0'=>'Inactive','1'=>'Active');
echo $this->Form->input('Filter by status',array('type'=>'select','empty' => __('Select'),'options'=>$status,'id'=>'status','onchange'=>'load_Meetingroom()'));
?>

<!-- Filters end -->

<!-- Search Form start (by Meetingroom name)-->

<?php
echo $this->Form->create('Meetingroom');
echo $this->Form->input('name',array('id'=>'search','label'=>'Search by meeting room name'));
echo $this->Form->end('Search');
?>
<!-- Search Form end -->

<!-- Meetingroom Lists start -->

<table align="center" id="Meetingroom">
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
</table>
<!-- Meetingroom Lists end -->

<!-- Pagination start -->


<?php 
	echo "Page : ".$this->Paginator->numbers();
	echo "&nbsp&nbsp&nbsp&nbsp";
	//echo "Page : ".$this->Paginator->counter(); 
	?>
<!-- Pagination end -->

<script>

//Script for filter Meetingroom using Meetingroom name

function load_Meetingroom(){
	var status=$("#status").val();
	$.ajax({
	url:"Meetingrooms/ajax_data/",
	data: { status: status },
	type:"POST",
	success:function(data) {
	$("#Meetingroom").html(data);
	}
	});
}


</script>