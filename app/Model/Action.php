<?php
class Action extends AppModel{
var $name = 'Action';
 public $hasOne=array('actionsqls','actionsetfields','actionremovefields','actionemails');
}
?>
