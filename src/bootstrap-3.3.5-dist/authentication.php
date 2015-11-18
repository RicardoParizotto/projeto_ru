<?php
	session_start();
	require ('./connect.php');
	
	if(!isset($_POST['inputEmail']) OR !isset($_POST['inputPassword'])){
		
	echo "<meta http-equiv=\"refresh\" content=\"0; url=index.php\">";}
	
	$qrySQL = "SELECT * FROM usuario WHERE email ='".$_POST['inputEmail']."' AND senha = '".$_POST['inputPassword'] . "';";
	//echo $qrySQL;
	$rs = mysql_query($qrySQL);
	if(!$rs)die("falha".mysql_error());
	//if(!$rs)
	//echo $_POST['inputEmail'];
	//echo $_POST['inputPassword'];
	//exit();
	if($rs){
		while($row = mysql_fetch_array($rs)){
			$usuario= $row['email'];
			$senha = $row['senha'];
		/*
			via post, informar que esta conectado
			redirecionar para a tela principal
		*/
		}
		if($usuario == $_POST['inputEmail'] && $senha == $_POST['inputPassword']){
			$_SESSION['user'] = $usuario;
			$_SESSION['pass'] =$senha ;//echo "aqui"; echo $_SESSION['pass']; echo $_SESSION['user'];
			echo "<meta http-equiv=\"refresh\" content=\"2; url=index.php\">";
		}
		else{
			if(isset($_SESSION['user']))unset($_SESSION['user']);
			if(isset($_SESSION['pass']))unset($_SESSION['pass']);
			echo "<meta http-equiv=\"refresh\" content=\"0; url=index.php?login_error=10 \">";
			//echo 'location.href = "index.php?error=10"';
		}
		
	}else{
		//echo("Usuário ou senha Inválida");
		if(isset($_SESSION['user']))unset($_SESSION['user']);
		if(isset($_SESSION['pass']))unset($_SESSION['pass']);
		unset($_POST['inputEmail']);
		unset($_POST['inputPassword']);
		//echo 'location.href = "index.php?error=10"';
		//header('Localização: index.php?login_error=10');
		//echo "<meta HTTP-EQUIV='refresh' CONTENT='5;URL=nome_do_arquivo.php'>";
		echo "<meta http-equiv=\"refresh\" content=\"1; url=index.php?login_error=10 \">";
		
		/* 
			retornar código código de erro via get
			redirecionar para tela de login

		*/
	}
//
?>
