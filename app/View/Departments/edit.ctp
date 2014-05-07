<div align="right"><?php echo $this->Html->link('Home',array('controller'=>'Users','action'=>'home')); ?></div>

<!-- Department edit form start -->

<div>
<?php
echo $this->Form->create('Department');
echo $this->Form->input('department_name');
$attributes  = array('legend' => false, 'default'=>'0');
$options = array('1' => 'Active', '0' => 'Inactive');
echo $this->Form->radio('status', $options, $attributes);

	//debug($department);
            foreach ( $department['Department'] as $field => $value) :
            if (!is_array($value)) {
                $idField = false;
            if (substr($field,-3) == '_id') {
                $idField = true;
                $fieldName = Inflector::camelize(substr($field,0,strpos($field,'_id')));
            } else {
                $fieldName = Inflector::camelize($field);
            }
        //debug($field);
        if ($field != 'created' && $field != 'modified') {
        echo $this->Form->input($field);
        }
        }
        endforeach;
		
echo $this->Form->Submit('Submit');
?>
</div>
<!-- Department edit form end -->

<?php
echo $action_name;
if($action_name=="Actionsql"){
        echo $this->Form->Create('actionsqls');
        echo $this->Form->input('query', array('type' => 'textarea','label'=>'SQL Query'));
    }
if($action_name=="Actionsetfield"){	
	echo "<h1>Set Field</h1>";
    
        echo $this->Form->Create('actionsetfields');
        echo $this->Form->input('module',array('type' => 'select','empty'=>'select','options'=>$module,'onchange'=>'load_field(this.value)'));
        echo $this->Form->input('field_name',array('type' => 'select','empty'=>'select','id'=>'fields'));
        echo $this->Form->input('value',array('label'=>'Value'));
    }
if($action_name=="Actionremovefield"){	
    echo "<h1>Remove Field</h1>";
        echo $this->Form->Create('actionremovefields');
        echo $this->Form->input('module',array('type' => 'select','empty'=>'select','options'=>$module,'onchange'=>'load_field1(this.value)'));
        echo $this->Form->input('field_name',array('type' => 'select','empty'=>'select','id'=>'fields1'));
        echo $this->Form->input('value',array('label'=>'Value'));
		}
if($action_name=="Actionemail"){			
	echo "<h1>Send Email</h1>";
        echo $this->Form->Create('actionemails');
       // echo $this->Form->input('module',array('type' => 'select','empty'=>'select','options'=>$module));
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
    }  
    ?>
