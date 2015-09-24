<?php
	require 'connect.php';
	
	function cardapio()
	{
		$qrySQL = 'SELECT * FROM Cardapio ORDER BY Data';	
		return mysql_query($qrySQL);
	}

?>
