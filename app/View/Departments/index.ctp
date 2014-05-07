<!-- Header Links start -->
<div align="right">
	<?php echo "Welcome <b>".$this->Session->read('User')."<b>";?>&nbsp;&nbsp;
	<?php echo $this->Html->link('add new department',array('action'=>'add')); ?>&nbsp;&nbsp;
	<?php echo $this->Html->link('Logout',array('controller'=>'Users','action'=>'logout')); ?>
</div>
<!-- Header Links end -->

<!-- Filters using Status, Department name -->

<?php 
$status=array('0'=>'Inactive','1'=>'Active');
echo $this->Form->input('Filter by status',array('type'=>'select','empty' => __('Select'),'options'=>$status,'id'=>'status','onchange'=>'load_department()'));
?>
<!-- Filters end -->

<!-- Search Form start (by department name)-->

<?php
echo $this->Form->create('Department');
echo $this->Form->input('name',array('id'=>'search','label'=>'Search by Department Name'));
echo $this->Form->input('dept_email',array('id'=>'search','label'=>'Search by Department Email'));
echo $this->Form->end('Search');
?>
<!-- Search Form end -->

<!-- Department Lists start -->

<table align="center" id="department">
	<tr>
		<th>Department Name</th>
		<th>Department Email</th>
		<th>Status</th>
		<th>Edit</th>
		<th>Delete</th>
		<th>Quick Links</th>
		
	</tr>
	<?php
	$i=1;
	$tot_count=count($options);
	
	foreach ($options as $option):
	
	echo "<tr>";
		echo "<td>".$option['Department']['department_name']."</td>";
		echo "<td>".$option['Department']['Department_email']."</td>";
		if($option['Department']['status']==1){
		echo "<td>Active</td>";
		}else{
		echo "<td>InActive</td>";
		}
		echo "<td>".$this->Html->link('edit',array('action'=>'edit',$option['Department']['id']))."</td>";
		echo "<td>".$this->Form->postLink(__('Delete'), array('action' => 'delete', $option['Department']['id']), null, __('Are you sure you want to delete %s?', $option['Department']['id']))."</td>";
		
		echo '<td>'.$this->Form->input("links",array("type"=>"button","label"=>"","onmouseover"=>"quick_links($i,$tot_count)")).'<ul id="quick_list'.$i.'"></ul></td>';
		echo "</tr>";
	$i++;
	endforeach;
	
	?>
</table>
<!-- Department Lists end -->

<!-- Pagination start -->

<?php 
	echo "Page : ".$this->Paginator->numbers();
	echo "&nbsp&nbsp&nbsp&nbsp";
	//echo "Page : ".$this->Paginator->counter(); 
	?>
<!-- Pagination end -->

<script>

//Script for filter department using department name

function load_department(){
	var status=$("#status").val();
	$.ajax({
	url:"Departments/ajax_data/",
	data: { status: status },
	type:"POST",
	success:function(data) {
	$("#department").html(data);
	}
	});
}

function quick_links(id,count){
	
	$.ajax({
	url:"Departments/quick_list/",
	data: { id: id },
	type:"POST",
	success:function(data) {
	for(i=1;i<=count;i++){
	if(i==id){
	$("#quick_list"+i).html(data);
	$("#quick_list"+i).show();
	}else{
	
	$("#quick_list"+i).hide();
	}
	}
	
	}
	});
}

</script>