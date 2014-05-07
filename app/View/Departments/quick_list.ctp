
	<?php
	$i=1;
	foreach ($quicklinks as $quicklink):
	echo "<li><a href='Departments/edit/".$id."/".$quicklink['Action']['action_type']."'>".$quicklink['Action']['action_name']."</a></li>";
	$i++;
	endforeach;
	?>
