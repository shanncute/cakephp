<!-- Session check if null redirect to login page -->

<?php
	$ses_user=$this->Session->read('User');
	if($ses_user==""){
		//echo "<script type='text/javascript'>window.location='index';</script>";
	}
?>
<!-- Session code end -->

<!-- Header Links start -->

<div align="right">
	<?php echo "Welcome <b>".$this->Session->read('User')."<b>";?>&nbsp;&nbsp;
	<?php echo $this->Html->link('Add new user',array('controller'=>'Users','action'=>'register')); ?>&nbsp;&nbsp;
	<?php echo $this->Html->link('Change password',array('controller'=>'Users','action'=>'change_password')); ?>&nbsp;&nbsp;
</div>

<!-- Header Links end -->

<!-- Filters using Status, Department name -->

<?php 
	$status=array('0'=>'Inactive','1'=>'Active');
	echo $this->Form->input('Filter by status',array('type'=>'select','empty' => __('Select'),'options'=>$status,'id'=>'status','onchange'=>'load_user()'));
?>
<?php
	echo $this->Form->input('department_id',array('type' => 'select','id'=>'department','onchange'=>'load_user()','empty' => __('Select'), 'options' => $dept,'label' => 'Filter by department name'));
?>
<!-- Filters end -->

<!-- Search Form start (by Users first name)-->

<?php
	echo $this->Form->create('User');
	echo $this->Form->input('name',array('id'=>'search','label'=>'Search by name'));
	echo $this->Form->end('Search');
?>
<!-- Search Form end -->

<!-- Users Lists start -->

<table align="center" id="user">
	<tr>
		<th>S.No</th>
		<th>Name</th>
		<th>Designation</th>
		<th>Email</th>
		<th>Department</th>
		<th>User Group</th>
		<th>Edit</th>
		<th>Status</th>
		<th>Delete</th>
	</tr>
	<?php
	$i=1;
	foreach($options as $option):
	echo "<tr>";
		echo "<td>".$i."</td>";
		echo "<td>".$option['User']['first_name']."</td>";
		echo "<td>".$option['User']['designation']."</td>";
		echo "<td>".$option['User']['email']."</td>";
		echo "<td>".$option['Department']['department_name']."</td>";
		echo "<td>".$option['Usergroup']['usergroup_name']."</td>";
		echo "<td>".$this->Html->Link('edit',array('action'=>'edit',$option['User']['id']))."</td>";
		if($option['User']['status']==1){
		echo "<td>Active</td>";
		}else{
		echo "<td>InActive</td>";
		}
		
		echo "<td>".$this->Form->postLink(__('Delete'), array('action' => 'delete', $option['User']['id']), null, __('Are you sure you want to delete %s?', $option['User']['id']))."</td>";
		
	echo "</tr>";
	$i++;
	endforeach;
	?>
</table>
<!-- Users Lists end -->

<!-- Pagination start -->



<?php 
	echo "Page : ".$this->Paginator->numbers();
	echo "&nbsp&nbsp&nbsp&nbsp";
	//echo "Page : ".$this->Paginator->counter(); 
	?>
<!-- Pagination end -->

<script>

//Script for filter department using department name

function load_user(){
	var status=$("#status").val();
	var department=$("#department").val();
	$.ajax({
	url:"load_user_ajax_data/",
	data: { status: status, department: department },
	type:"POST",
	success:function(data) {
	$("#user").html(data);
	}
	});
}

</script>