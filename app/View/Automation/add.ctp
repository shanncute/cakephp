<?php
    echo $this->Form->create('Automation');
    
    $automation_type1=array('Quick links','Scheduled','Record action');
    $automation_type2=array('quick_link','schedule','record_action');
    $automation_type=  array_combine( $automation_type2,$automation_type1);
    echo $this->Form->input('automation_type',array('type' => 'select','options'=>$automation_type,'empty'=>'select','onchange'=>'show_box_sender(this.value)'));
    
    echo $this->Form->input('automation_name');
    
    $Mod = App::objects('Model');
    $toremove = array('Action','Attribute','AppModel','Actionemail','Actionremovefield','Actionsetfield','Actionsql');
    $Mod=  array_diff($Mod,$toremove);
    $module=  array_combine($Mod, $Mod);
    $this->set('module',$module);
    echo $this->Form->input('module',array('type' => 'select','empty'=>'select','options'=>$module));
    
    $attributes  = array('legend' => false, 'default'=>'');
    $options=array('Active','Inactive');
    echo $this->Form->radio('status',$options,$attributes);
    echo $this->Form->input('run_date');
    echo $this->Form->input('run_time');
    
    $repeats=array('Daily','Weekly','Monthly','Yearly');
    echo $this->Form->input('repeat',array('type' => 'select','options'=>$repeats,'empty'=>'select'));
    echo $this->Form->input('until');
    //echo $this->Form->input('test',array('onclick'=>'load_step()'));
    echo "<br>";
    echo $this->Html->image('cake_logo.png', array('alt' => 'Next Step','onclick'=>'load_step()'));
    echo $this->Form->create('Automationstep');
    echo "<table id='step_table'>";
    echo "<tr><td>";
    echo $this->Form->input('step_name');
    echo $this->Form->input('action_id',array('type' => 'select','empty'=>'select','options'=>$actions));
    echo "</td></tr>";
    echo "</table>";
   
    echo $this->Form->submit();
?>

<script>
    function load_step(){
        $('#step_table').append($('#step_table tr:last td:last').html());
    }
</script>