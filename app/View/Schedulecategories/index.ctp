
<!-- Header Links start -->

<div align="right">
	<?php echo "Welcome <b>".$this->Session->read('User')."<b>";?>&nbsp;&nbsp;
	<?php echo $this->Html->link('add new Schedulecategory',array('action'=>'add')); ?>&nbsp;&nbsp;
	<?php echo $this->Html->link('Logout',array('controller'=>'Users','action'=>'logout')); ?>
</div>
<!-- Header Links end -->

<!-- Filters using Status, Schedulecategory name -->

<?php 
$status=array('0'=>'Inactive','1'=>'Active');
echo $this->Form->input('Filter by status',array('type'=>'select','empty' => __('Select'),'options'=>$status,'id'=>'status','onchange'=>'load_Schedulecategory()'));
?>

<!-- Filters end -->

<!-- Search Form start (by Schedulecategory name)-->

<?php
echo $this->Form->create('Schedulecategory');
echo $this->Form->input('name',array('id'=>'search','label'=>'Search by schedule categories name'));
echo $this->Form->end('Search');
?>
<!-- Search Form end -->

<!-- Schedulecategory Lists start -->

<table align="center" id="Schedulecategory">
	<tr>
		<th>Schedulecategory Name</th>
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
		if($option['Schedulecategory']['schedule_type']==1){
		echo "<td>Audit</td>";
		}else{
		echo "<td>Others</td>";
		}
		echo "<td>".$this->Html->link('edit',array('action'=>'edit',$option['Schedulecategory']['id']))."</td>";
		if($option['Schedulecategory']['status']==1){
		echo "<td>Active</td>";
		}else{
		echo "<td>InActive</td>";
		}
		echo "<td>".$this->Form->postLink(__('Delete'), array('action' => 'delete', $option['Schedulecategory']['id']), null, __('Are you sure you want to delete %s?', $option['Schedulecategory']['id']))."</td>";
	echo "</tr>";
	$i++;
	endforeach;
	?>
</table>
<!-- Schedulecategory Lists end -->

<!-- Pagination start -->

<?php 
	echo "Page : ".$this->Paginator->numbers();
	echo "&nbsp&nbsp&nbsp&nbsp";
	//echo "Page : ".$this->Paginator->counter(); 
	?>
<!-- Pagination end -->

<script>

//Script for filter Schedulecategory using Schedulecategory name

function load_Schedulecategory(){
	var status=$("#status").val();
	$.ajax({
	url:"Schedulecategories/ajax_data/",
	data: { status: status },
	type:"POST",
	success:function(data) {
	$("#Schedulecategory").html(data);
	}
	});
}

//Script for Pagination

function load_paginate(id){
	$.ajax({
	url:"Schedulecategories/load_page/"+id,
	//data: { page: id },
	type:"POST",
	success:function(data) {
	$("#Schedulecategory").html(data);
	}
	});
}
</script>