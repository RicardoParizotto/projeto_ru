<?php
	require 'connect.php';
	
	$qrySQL = 'SELECT * FROM Cardapio WHERE _id='.$_GET['id'].';';

	$rs = mysql_query($qrySQL);
	
	$row = mysql_fetch_array($rs);

	$col = 'nota_n';

	if($_GET['vote'] == 'like')
		$col = 'nota_p';

	$qrySQL2 = 'UPDATE Cardapio SET '.$col.' = '.($row[$col] + 1).' WHERE _id = 2'; 

	print $qrySQL2;

	mysql_query($qrySQL2);

	header("location:index.php");

?>
