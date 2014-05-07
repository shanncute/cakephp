
<!-- Header Links start -->

<div align="right">
	<?php echo "Welcome <b>".$this->Session->read('User')."<b>";?>&nbsp;&nbsp;
	<?php echo $this->Html->link('add new Article',array('action'=>'add')); ?>&nbsp;&nbsp;
	<?php echo $this->Html->link('Logout',array('controller'=>'Users','action'=>'logout')); ?>
</div>
<!-- Header Links end -->

<!-- Search Form start (by Users first name)-->

<?php
	echo $this->Form->create('Article');
	echo $this->Form->input('name',array('id'=>'search','label'=>'Search by name'));
	echo $this->Form->end('Search');
?>
<!-- Search Form end -->

<!-- Article Lists start -->

<table align="center" id="Article">
	<tr>
		<th>Article Name</th>
		<th>Date of posting</th>
		<th>View document</th>
		<th>Related Articles</th>
		<th>Status</th>
	</tr>
	<?php
	$i=1;
	foreach ($options as $option):
	echo "<tr>";
		echo "<td>".$this->Html->link($option['Article']['article_name'],array('action'=>'view',$option['Article']['id']))."</td>";
		echo "<td>".$option['Article']['date_of_posting']."</td>";
		echo "<td>".$this->Html->link('View','../img/article_images/'.$option['Article']['upload_file'])."</td>";
		echo "<td>".$this->Html->link('click here',array('action'=>'#',$option['Article']['id']))."</td>";
		echo "<td>Forwarded</td>";
	echo "</tr>";
	$i++;
	endforeach;
	?>
</table>
<!-- Article Lists end -->

<!-- Pagination start -->

<?php 
	echo $this->Paginator->numbers();
	
	?>
<!-- Pagination end -->


<script>

//Script for filter Article using Article name

function load_Article(){
	var status=$("#status").val();
	$.ajax({
	url:"Articles/ajax_data/",
	data: { status: status },
	type:"POST",
	success:function(data) {
	$("#Article").html(data);
	}
	});
}
$('#auth').click(function() {
var a=$('#auth').attr('checked');
if(a=='checked'){
    $('#u_group').show();
	
	}else{
	$('#u_group').hide();
	
	}
});

function load_user(id){
	var status=$("#status").val();
	$.ajax({
	url:"user_data/",
	data: { id: id },
	type:"POST",
	success:function(data) {
	$("#user").html(data);
	}
	});
}
</script>