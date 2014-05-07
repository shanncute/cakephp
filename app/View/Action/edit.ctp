<?php
//pr($this->request->data);
$res=$this->request->data;
$action_type=$res['Action']['action_type'];
?>
<script>
   function load(val){
       if(val=="Actionsql"){
           $('#sql').show();
           $('#set').hide();
           $('#remove').hide();
           $('#email').hide();
           $('#hid_id').val('actionsqls');
       }
       if(val=="Actionsetfield"){
           $('#sql').hide();
           $('#set').show();
           $('#remove').hide();
           $('#email').hide();
           $('#hid_id').val('actionsetfields');
       }
       if(val=="Actionremovefield"){
           $('#sql').hide();
           $('#set').hide();
           $('#remove').show();
           $('#email').hide();
           $('#hid_id').val('actionremovefields');
       }
       if(val=="Actionemail"){
           $('#sql').hide();
           $('#set').hide();
           $('#remove').hide();
           $('#email').show();
           $('#hid_id').val('actionemails');
       }
    }
function show_box_to(){
    var val_to=$('#other_field_to').attr('checked');
    if(val_to=="checked"){
    $('#other_to').show();
    }else{
    $('#other_to').hide();
    }
}
function show_box_cc(){
    var val_cc=$('#other_field_cc').attr('checked');
    if(val_cc=="checked"){
    $('#other_cc').show();
    }else{
    $('#other_cc').hide();
    }
}
function show_box_bcc(){
    var val_bcc=$('#other_field_bcc').attr('checked');
    if(val_bcc=="checked"){
    $('#other_bcc').show();
    }else{
    $('#other_bcc').hide();
    }
}
function show_box_sender(val){
    if(val=="1"){
    $('#other_sender').show();
    }else{
    $('#other_sender').hide();
    }
}
</script>
<?php
    echo $this->Form->Create('Action');
    echo $this->Form->input('action_name',array('label'=>'Action name'));
    echo $this->Form->input('table',array('id'=>'hid_id','type'=>'text'));
    $attributes  = array('legend' => false, 'default'=>'','id'=>'action','onclick'=>'return load(this.value)');
    $options = array('Actionsql' => 'Run SQL Statement', 'Actionsetfield' => 'Set field value', 'Actionremovefield' => 'Remove field value', 'Actionemail' => 'Send Mail');
    echo $this->Form->radio('action_type', $options, $attributes);
  
?>
<?php
if($action_type=="Actionsql"){
?>
<div id="sql" >
    <?php
        echo $this->Form->Create('actionsqls');
        echo $this->Form->input('module',array('type' => 'select','empty'=>'select','options'=>$module));
        echo $this->Form->input('query', array('type' => 'textarea','label'=>'SQL Query'));
    ?>
</div>
<?php
}
if($action_type=="Actionsetfield"){
?>
<div id="set" >
    <h1>Set Field</h1>
    <?php
        echo $this->Form->Create('actionsetfields');
        echo $this->Form->input('module',array('type' => 'select','options'=>$module,'onchange'=>'load_field(this.value)'));
        echo $this->Form->input('field_name',array('type' => 'select','id'=>'fields'));
        echo $this->Form->input('value',array('label'=>'Value'));
    ?>
</div>
<?php
}
if($action_type=="Actionremovefield"){
?>
<div id="remove" >
    <h1>Remove Field</h1>
    <?php
        echo $this->Form->Create('actionremovefields');
        echo $this->Form->input('module',array('type' => 'select','empty'=>'select','options'=>$module,'onchange'=>'load_field1(this.value)'));
        echo $this->Form->input('field_name',array('type' => 'select','empty'=>'select','id'=>'fields1'));
        echo $this->Form->input('value',array('label'=>'Value'));
    ?>
</div>
<?php
}
if($action_type=="Actionemail"){
?>
<div id="email" >
    <h1>Send Email</h1>
    <?php
        echo $this->Form->Create('actionemails');
        echo $this->Form->input('module',array('type' => 'select','empty'=>'select','options'=>$module));
        echo $this->Form->input('mail_sender',array('type' => 'select','options'=>$mail_sender,'empty'=>'select','onchange'=>'show_box_sender(this.value)'));
        echo "<td>".$this->Form->input('mail_sender_other',  array('label'=>'','id'=>'other_sender','style'=>'display:none;'))."</td>";
        echo "<table><tr>";
        echo "<td>To</td><td>Cc</td><td>Bcc</td>";
        echo "</tr><tr>";
        echo "<td>".$this->Form->input('owner_to',  array('type'=>'checkbox','label'=>'Owner','value'=>'san@san.com'))."</td>";
        echo "<td>".$this->Form->input('owner_cc',  array('type'=>'checkbox','label'=>'Owner','value'=>'san@san.com'))."</td>";
        echo "<td>".$this->Form->input('owner_bcc',  array('type'=>'checkbox','label'=>'Owner','value'=>'san@san.com'))."</td>";
        echo "</tr><tr>";
        echo "<td>".$this->Form->input('current_user_to',  array('type'=>'checkbox','label'=>'Current User','id'=>'current_user_to','value'=>'sankar.k@angleritech.com'))."</td>";
        echo "<td>".$this->Form->input('current_user_cc',  array('type'=>'checkbox','label'=>'Current User','id'=>'current_user_cc','value'=>'sankar.k@angleritech.com'))."</td>";
        echo "<td>".$this->Form->input('current_user_bcc',  array('type'=>'checkbox','label'=>'Current User','id'=>'current_user_bcc','value'=>'sankar.k@angleritech.com'))."</td>";
        
        echo "</tr><tr>";
        echo "<td>".$this->Form->input('Others',  array('type'=>'checkbox','id'=>'other_field_to','onclick'=>'show_box_to()'))."</td>";
        echo "<td>".$this->Form->input('Others',  array('type'=>'checkbox','id'=>'other_field_cc','onclick'=>'show_box_cc()'))."</td>";
        echo "<td>".$this->Form->input('Others',  array('type'=>'checkbox','id'=>'other_field_bcc','onclick'=>'show_box_bcc()'))."</td>";
        echo "</tr><tr style='border:none;'>";
        echo "<td>".$this->Form->input('other_to',  array('label'=>'','id'=>'other_to','style'=>'display:none;'))."</td>";
        echo "<td>".$this->Form->input('other_cc',  array('label'=>'','id'=>'other_cc','style'=>'display:none;'))."</td>";
        echo "<td>".$this->Form->input('other_bcc',  array('label'=>'','id'=>'other_bcc','style'=>'display:none;'))."</td>";
        echo "</tr></table>";
        echo $this->Form->input('subject');
        echo $this->Form->input('body', array('type' => 'textarea'));
        echo $this->Form->input('signature', array('type' => 'textarea','label'=>'Email Signature'));
       
    ?>
</div>
<?php
}
?>
<?php
    
    echo $this->Form->submit('submit');
?>
<script>

$("#actionremovefieldsModule").trigger('change');
$("#actionsetfieldsModule").trigger('change');
function load_field(val){
	$.ajax({
	url:"../load_field/",
	data: { module: val },
	type:"POST",
	success:function(data) {
        //alert(data);
	$("#fields").html(data);
	}
	});
}

function load_field1(val){
	$.ajax({
	url:"../load_field/",
	data: { module: val },
	type:"POST",
	success:function(data) {
        //alert(data);
	$("#fields1").html(data);
	}
	});
}
</script>