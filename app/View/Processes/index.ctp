<!-- Header Links start -->

<div align="right">
	<?php echo "Welcome <b>".$this->Session->read('User')."<b>";?>&nbsp;&nbsp;
	<?php echo $this->Html->link('add new Process',array('action'=>'add')); ?>&nbsp;&nbsp;
	<?php echo $this->Html->link('Logout',array('controller'=>'Users','action'=>'logout')); ?>
</div>
<!-- Header Links end -->

<!-- Filters using Status, Process name -->

<?php 
$status=array('0'=>'Inactive','1'=>'Active');
echo $this->Form->input('Filter by status',array('type'=>'select','empty' => __('Select'),'options'=>$status,'id'=>'status','onchange'=>'load_Process()'));
?>

<!-- Filters end -->

<!-- Search Form start (by Process name)-->

<?php
echo $this->Form->create('Process');
echo $this->Form->input('name',array('id'=>'search','label'=>'Search by process name'));
echo $this->Form->end('Search');
?>
<!-- Search Form end -->

<!-- Process Lists start -->

<table align="center" id="Process">
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
</table>
<!-- Process Lists end -->

<!-- Pagination start -->

<?php 
	echo "Page : ".$this->Paginator->numbers();
	echo "&nbsp&nbsp&nbsp&nbsp";
	//echo "Page : ".$this->Paginator->counter(); 
	?>
<!-- Pagination end -->

<script>

//Script for filter Process using Process name

function load_Process(){
	var status=$("#status").val();
	$.ajax({
	url:"Processes/ajax_data/",
	data: { status: status },
	type:"POST",
	success:function(data) {
	$("#Process").html(data);
	}
	});
}


</script>