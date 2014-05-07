<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<?php echo $this->Html->script('jquery'); ?>
	<?php echo $this->Html->script('jquery-select2'); ?>
	<?php echo $this->Html->script('scroll'); ?>
	<?php echo $this->Html->script('chosen.jquery'); ?>
	
	
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');
		echo $this->Html->css('select2');
		echo $this->Html->css('order');
		echo $this->Html->css('chosen');
		

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1><?php //echo $this->Html->link($cakeDescription, 'http://cakephp.org'); ?></h1>
	<?php 
	$sesion_value=$this->Session->read('User');
	//echo $sesion_value;
	if($sesion_value!=""){
	?>
	<?php echo $this->Html->link('Articles',array('controller'=>'Articles','action'=>'index')); ?>&nbsp;&nbsp;
	<?php echo $this->Html->link('Auditschedules',array('controller'=>'Auditschedules','action'=>'index')); ?>&nbsp;&nbsp;
	<?php echo $this->Html->link('Departments',array('controller'=>'Departments','action'=>'index')); ?>&nbsp;&nbsp;
	<?php echo $this->Html->link('Usergroups',array('controller'=>'Usergroups','action'=>'index')); ?>&nbsp;&nbsp;
	<?php echo $this->Html->link('Schedule_category',array('controller'=>'Schedulecategories','action'=>'index')); ?>&nbsp;&nbsp;
	<?php echo $this->Html->link('Schedule_subcategory',array('controller'=>'Schedulesubcategories','action'=>'index')); ?>&nbsp;&nbsp;
	<?php echo $this->Html->link('Process',array('controller'=>'Processes','action'=>'index')); ?>&nbsp;&nbsp;
	<?php echo $this->Html->link('Audit_checklist',array('controller'=>'Auditchecklists','action'=>'index')); ?>&nbsp;&nbsp;
	<?php echo $this->Html->link('Meeting_room',array('controller'=>'Meeting rooms','action'=>'index')); ?>&nbsp;&nbsp;
	
	<?php echo $this->Html->link('Logout',array('controller'=>'Users','action'=>'logout')); ?>
	<?php
	}
	?>
		</div>
		<div id="content">
		
			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
			
		</div>
		<div id="footer">
			<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false)
				);
			?>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
