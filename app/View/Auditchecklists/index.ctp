<!-- Header Links start -->

<div align="right">
	<?php echo "Welcome <b>".$this->Session->read('User')."<b>";?>&nbsp;&nbsp;
	<?php echo $this->Html->link('add new Auditchecklist',array('action'=>'add')); ?>&nbsp;&nbsp;
	<?php echo $this->Html->link('Logout',array('controller'=>'Users','action'=>'logout')); ?>
</div>
<!-- Header Links end -->

<!-- Filters using Status, Auditchecklist name -->

<?php 
$status=array('0'=>'Inactive','1'=>'Active');
echo $this->Form->input('Filter by status',array('type'=>'select','empty' => __('Select'),'options'=>$status,'id'=>'status','onchange'=>'load_Auditchecklist()'));
?>

<!-- Filters end -->

<!-- Search Form start (by Auditchecklist name)-->

<?php
echo $this->Form->create('Auditchecklist');
echo $this->Form->input('name',array('id'=>'search','label'=>'Search by Audit checklist name'));
echo $this->Form->end('Search');
?>
<!-- Search Form end -->

<!-- Auditchecklist Lists start -->

<table align="center" id="Auditchecklist">
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
</table>
<!-- Auditchecklist Lists end -->

<!-- Pagination start -->


<?php 
	echo "Page : ".$this->Paginator->numbers();
	echo "&nbsp&nbsp&nbsp&nbsp";
	//echo "Page : ".$this->Paginator->counter(); 
	?>
<!-- Pagination end -->

<script>

//Script for filter Auditchecklist using Auditchecklist name

function load_Auditchecklist(){
	var status=$("#status").val();
	$.ajax({
	url:"Auditchecklists/ajax_data/",
	data: { status: status },
	type:"POST",
	success:function(data) {
	$("#Auditchecklist").html(data);
	}
	});
}


</script>