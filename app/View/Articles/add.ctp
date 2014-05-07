<div align="right"><?php echo $this->Html->link('Home',array('controller'=>'Articles','action'=>'index')); ?></div>

<!-- Article add form start -->

<div>
<?php
//$date=date('d-m-Y');
echo $this->Form->create('Article', array('type' => 'file'));
echo $this->Form->input('article_name');
echo $this->Form->input('keywords');
echo $this->Form->input('keywords_description');
echo $this->Form->input('author',array('type' => 'select', 'empty' => __('Select'), 'options' => array('author1','author2','author3'),'label' => 'Author'));
echo $this->Form->input('date_of_posting');
echo $this->Form->input('article_description');
echo $this->Form->input('upload_file',array('type'=>'file'));
//echo $this->Form->input('usergroup_id',array('type' => 'select', 'empty' => __('Select'), 'options' => $Usergroup,'label' => 'Aproval authority'));
echo $this->Form->input('usergroup_id',array('type' => 'select', 'empty' => __('Select'), 'options' => $Usergroup,'label' => 'User Groups','onchange'=>'load_user(this.value)'));
echo $this->Form->input('user_id',array('type' => 'select', 'empty' => __('Select') ,'label' => 'User','id'=>'user'));
?>
<?php
			//debug($article);
            foreach ( $article['Article'] as $field => $value) :
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
    ?>
	<?php echo $this->Form->end(__('Submit', true));?>
</div>



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