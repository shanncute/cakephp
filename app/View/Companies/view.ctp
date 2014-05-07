<div >
   <?php
	foreach ($options as $res): 

		echo "<div>id :".$res['id']."</div>"; 
		echo "<div>Company Name :".$res['company_name']."</div>"; 
		echo "<div>Domain Name :".$res['domain_name']."</div>"; 
	endforeach;
     ?>
</div>

