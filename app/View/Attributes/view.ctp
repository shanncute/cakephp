<div >
	<dl><?php $i = 0; $class = ' class="altrow"';?>
   <?php
	foreach ($options as $res): 

		echo "<div>id :".$res['id']."</div>"; 
		echo "<div>Field Name :".$res['name']."</div>"; 
		echo "<div>Model Name :".$res['model']."</div>"; 
		echo "<div>Data type :".$res['data_type']."</div>"; 
	endforeach;
     ?>
	</dl>
</div>

