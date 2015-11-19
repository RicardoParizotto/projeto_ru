<?php
	if($_POST['id']){
		
		$id = $_POST['id'];
		if($_POST['type'] == 1)$op = "nota_p"; else $op = "nota_n";
		
		
		$query = "select" .$op. "from Cardapio where _id = '".$id. "'";
		$row = mysql_query($query);
		if($row){
			$total = $row[0] + 1;
		
			$query = "update Cardapio set".$op."='".$total."' where _id='".$id."'";
			$row = mysql_query($query);
			if($row)echo "1";
		}
		echo $return_count = 'err';
		
		
		
		
	}
?>