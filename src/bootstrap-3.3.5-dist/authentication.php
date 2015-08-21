<?php
	require ('./connect.php');
	
	$qrySQL = 'SELECT * FROM usuario WHERE email ="'.$_POST['inputEmail'].'" AND senha = '.$_POST['inputPassword'];
	$rs = mysql_query($qrySQL);

	if(mysql_num_rows($rs)){
		/*
			via post, informar que esta conectado
			redirecionar para a tela principal
		*/
		
	}else{
		/* 
			retornar código código de erro via get
			redirecionar para tela de login

		*/
	}

?>
