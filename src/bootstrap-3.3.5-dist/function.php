<?php
	require 'connect.php';
	
	function cardapio()
	{
		$qrySQL = 'SELECT * FROM Cardapio ORDER BY Data';	
		return mysql_query($qrySQL);
	}
	
	function vote($var, $id, $qtd)
	{	
		if(isset($_COOKIE['SET'])) return;
		$attr = 'nota_n';
		if($var)
			$attr ='nota_p';
			
		$qrySQL = 'UPDATE Cardapio SET '.$attr.' = '.($qtd + 1).' WHERE _id = '.$id;
		mysql_query($qrySQL);

		setcookie("SET", "TRUE", 2147483647);
	}

?>
