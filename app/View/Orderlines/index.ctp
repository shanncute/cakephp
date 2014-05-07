
<div>
<div class="div_freezepanes_wrapper">

<div class="div_verticalscroll" >
	<div style="height:50%;" onmousedown="upp();" onmouseup="upp(1);"><?php echo $this->Html->image('uF035.png',array('class'=>'buttonUp'));?></div>
	<div style="height:50%;" onmousedown="down();" onmouseup="down(1);"><?php echo $this->Html->image('uF036.png',array('class'=>'buttonDn'));?></div>
</div>

<div class="div_horizontalscroll" >
	<div style="float:left;width:50%;height:100%;" onmousedown="right();" onmouseup="right(1);"><?php echo $this->Html->image('uF033.png',array('class'=>'buttonRight'));?></div>
	<div style="float:right;width:50%;height:100%;" onmousedown="left();" onmouseup="left(1);"><?php echo $this->Html->image('uF034.png',array('class'=>'buttonLeft'));?></div>
</div>
<?php
echo $this->Form->create('Orderline',array('style'=>'width:100%;'));
?>
<table id="t1" cellpadding="1">
<div style="background-color:#29A9CC;font-weight:bold;color:white;padding:10px;font-size:14pt;">
Order Line
</div>
<tbody><tr>
<th class="th" width="10px;">Line No</th>
<th class="th">Your Material No</th>
<th class="th">Article Ticket</th>
<th class="th">Brand</th>
<th class="th">Ticket</th>
<th class="th">Shade Code</th>
<th class="th">Length</th>
<th class="th">Quantity</th>
<th class="th">Action</th>
<th class="th">Expand/Collapse</th>
</tr>
<?php
if(isset($b)){
$a=$b;
}else{
$a=100;
}
for($i=1; $i<=$a;$i++){
?>
<tr>
<?php
echo "<td class='td1'><b>".$i."</b></td>";
echo "<td nowrap='nowrap'>".$this->Form->input('material_no',array('label'=>'','name'=>'material_no[]','class'=>'textbox'))."</td>";
echo "<td nowrap='nowrap'>".$this->Form->input('article_ticket',array('label'=>'','name'=>'article_ticket[]','class'=>'textbox'))."</td>";

echo "<td nowrap='nowrap'>".$this->Form->input('brand',array('label'=>'','class'=>'chzn-select','style'=>'width:100px;' ,'tabindex'=>'2','type'=>'select','options'=>array('1'=>'new','2'=>'old'),'empty'=>'select','name'=>'brand[]'))."</td>";

echo "<td nowrap='nowrap'>".$this->Form->input('ticket',array('label'=>'','class'=>'chzn-select','style'=>'width:100px;' ,'tabindex'=>'2','type'=>'select','options'=>array('1'=>'new','2'=>'old'),'empty'=>'select','name'=>'ticket[]'))."</td>";

echo "<td nowrap='nowrap'>".$this->Form->input('shade_code',array('label'=>'','name'=>'shade_code[]','class'=>'textbox'))."</td>";
echo "<td nowrap='nowrap'>".$this->Form->input('Length',array('label'=>'','name'=>'Length[]','class'=>'textbox'))."</td>";
echo "<td nowrap='nowrap'>".$this->Form->input('quality',array('label'=>'','name'=>'quality[]','class'=>'textbox'))."</td>";
echo "<td nowrap='nowrap' style='text-align:center;'>".$this->Html->link($this->Html->image('delete.png'), array('action' => '',$a-1),array( 'escape' => false))."</td>";
echo "<td nowrap='nowrap'><input type='button' value='click' onclick='expand($i)'/></td>";
echo "</tr>";
}
echo $this->Form->input('row_count',array('type'=>'hidden','value'=>$a,'id'=>'row_count'));
?>
</tbody></table>
</div>
<?php
for($j=1;$j<=100;$j++){
?>
<table  id='panel<?php echo $j;?>' border="0" cellspacing="0" cellpadding="0" class="panel2" >
      <tr>
        <th>Your Material No.</th>
        <td><?php echo $j;?></td>
        <th>Length</th>
        <td>1000</td>
      </tr>
       <tr>
         <th>Artical Ticket</th>
         <td>10203040</td>
         <th>Special Finishes</th>
         <td>F</td>
       </tr>
       <tr>
         <th>Brand</th>
         <td>Astra</td>
         <th>Customer References</th>
         <td>xyz</td>
       </tr>
       <tr>
         <th>Ticket</th>
         <td>100</td>
         <th>Quantity</th>
         <td>10</td>
       </tr>
       <tr>
         <th>Shade Code</th>
         <td>C1200</td>
         <th>Net Price</th>
         <td>C1200</td>
       </tr>
       <tr>
         <th>Coats Material No.</th>
         <td>10203040-C1200</td>
         <th>Error Message</th>
         <td>10203040-C1200</td>
       </tr>
    </table>   
<?php
}
?>
<br><br>
<div align="right" style="padding-right:150px;">
<?php
//echo $this->Form->input('reset',array('type'=>'reset','label'=>''));
echo $this->Form->submit('Submit');

?>
</div>
</div>

<!-- Expand collapse script -->

<script> 
function expand(id){
var p="#panel"+id;
    $(p).slideToggle("slow");
}
</script>

<!-- Search select box script -->

<script type="text/javascript"> 
    var config = {
      '.chzn-select'           : {},
      '.chzn-select-deselect'  : {allow_single_deselect:true},
      '.chzn-select-no-single' : {disable_search_threshold:10},
      '.chzn-select-no-results': {no_results_text:'Oops, nothing found!'},
      '.chzn-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }
</script>
