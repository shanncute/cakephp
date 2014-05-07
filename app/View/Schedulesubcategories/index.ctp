
<!-- Header Links start -->

<div align="right">
	<?php echo "Welcome <b>".$this->Session->read('User')."<b>";?>&nbsp;&nbsp;
	<?php echo $this->Html->link('add new Schedulesubcategory',array('action'=>'add')); ?>&nbsp;&nbsp;
	<?php echo $this->Html->link('Logout',array('controller'=>'Users','action'=>'logout')); ?>
</div>
<!-- Header Links end -->

<!-- Filters using Status, Schedulesubcategory name -->

<?php 
$status=array('0'=>'Inactive','1'=>'Active');
echo $this->Form->input('Filter by status',array('type'=>'select','empty' => __('Select'),'options'=>$status,'id'=>'status','onchange'=>'load_Schedulesubcategory()'));
?>

<!-- Filters end -->

<!-- Search Form start (by Schedulesubcategory name)-->

<?php
echo $this->Form->create('Schedulesubcategory');
echo $this->Form->input('name',array('id'=>'search','label'=>'Search by schedule subcategories name'));
echo $this->Form->end('Search');
?>
<!-- Search Form end -->

<!-- Schedulesubcategory Lists start -->

<table align="center" id="Schedulesubcategory">
	<tr>
		<th>Schedulecategory Name</th>
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
		echo "<td>".$option['Schedulecategory']['schedulecategory_name']."</td>";
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
</table>
<!-- Schedulesubcategory Lists end -->

<!-- Pagination start -->

<?php 
	echo "Page : ".$this->Paginator->numbers();
	echo "&nbsp&nbsp&nbsp&nbsp";
	//echo "Page : ".$this->Paginator->counter(); 
	?>
<!-- Pagination end -->

<script>

//Script for filter Schedulesubcategory using Schedulesubcategory name

function load_Schedulesubcategory(){
	var status=$("#status").val();
	$.ajax({
	url:"Schedulecategories/ajax_data/",
	data: { status: status },
	type:"POST",
	success:function(data) {
	$("#Schedulesubcategory").html(data);
	}
	});
}

</script>