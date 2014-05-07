<div align="right"><?php echo $this->Html->link('Home',array('controller'=>'Users','action'=>'home')); ?></div>

<!-- Article view start -->

<b>Article Details </b>
<table align="center">
<?php
echo "<tr><td>Article Name </td><td>".$res['Article']['article_name']."</td></tr>";
echo "<tr><td>Author Name </td><td>".$res['User']['first_name']."</td></tr>";
echo "<tr><td>Keywords </td><td>".$res['Article']['keywords']."</td></tr>";
echo "<tr><td>Keywords description </td><td>".$res['Article']['keywords_description']."</td></tr>";
echo "<tr><td>Date of posting </td><td>".$res['Article']['date_of_posting']."</td></tr>";
echo "<tr><td>Article description </td><td>".$res['Article']['article_description']."</td></tr>";
echo "<tr><td>Aproval authority </td><td>".$res['Usergroup']['usergroup_name']."</td></tr>";

?>

</table>
<?php
echo "<td>".$this->Html->link('edit',array('action'=>'edit',$res['Article']['id']))."</td>&nbsp;&nbsp;";
		echo "<td>".$this->Form->postLink(__('Delete'), array('action' => 'delete', $res['Article']['id']), null, __('Are you sure you want to delete %s?', $res['Article']['id']))."</td>";
?>
<!-- Department view end -->