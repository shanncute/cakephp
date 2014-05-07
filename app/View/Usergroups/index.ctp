
<!-- Header Links start -->

<div align="right">
	<?php echo "Welcome <b>".$this->Session->read('User')."<b>";?>&nbsp;&nbsp;
	<?php echo $this->Html->link('add new Usergroup',array('action'=>'add')); ?>&nbsp;&nbsp;
	<?php echo $this->Html->link('Logout',array('controller'=>'Users','action'=>'logout')); ?>
</div>
<!-- Header Links end -->

<!-- Filters using Status, Usergroup name -->

<?php 
$status=array('0'=>'Inactive','1'=>'Active');
echo $this->Form->input('Filter by status',array('type'=>'select','empty' => __('Select'),'options'=>$status,'id'=>'status','onchange'=>'load_Usergroup()'));
?>

<!-- Filters end -->

<!-- Search Form start (by Usergroup name)-->

<?php
echo $this->Form->create('Usergroup');
echo $this->Form->input('name',array('id'=>'search','label'=>'Search by usergroup name'));
echo $this->Form->end('Search');
?>
<!-- Search Form end -->

<!-- Usergroup Lists start -->

<table align="center" id="Usergroup">
	<tr>
		<th>Usergroup Name</th>
		<th>Edit</th>
		<th>Status</th>
		<th>Delete</th>
	</tr>
	<?php
	$i=1;
	foreach ($options as $option):
	echo "<tr>";
		echo "<td>".$option['Usergroup']['usergroup_name']."</td>";
		echo "<td>".$this->Html->link('edit',array('action'=>'edit',$option['Usergroup']['id']))."</td>";
		if($option['Usergroup']['status']==1){
		echo "<td>Active</td>";
		}else{
		echo "<td>InActive</td>";
		}
		echo "<td>".$this->Form->postLink(__('Delete'), array('action' => 'delete', $option['Usergroup']['id']), null, __('Are you sure you want to delete %s?', $option['Usergroup']['id']))."</td>";
	echo "</tr>";
	$i++;
	endforeach;
	?>
</table>
<!-- Usergroup Lists end -->

<!-- Pagination start -->

<?php 
	echo "Page : ".$this->Paginator->numbers();
	echo "&nbsp&nbsp&nbsp&nbsp";
	//echo "Page : ".$this->Paginator->counter(); 
	?>
<!-- Pagination end -->

<script>

//Script for filter Usergroup using Usergroup name

function load_Usergroup(){
	var status=$("#status").val();
	$.ajax({
	url:"Usergroups/ajax_data/",
	data: { status: status },
	type:"POST",
	success:function(data) {
	$("#Usergroup").html(data);
	}
	});
}


</script>