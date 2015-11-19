<?php 
 session_start();
if(!isset($_SESSION['user']) OR !isset($_SESSION['pass'])){
		//echo "<meta http-equiv=\"refresh\" content=\"0; url=index.php \">";
		header("Location: index.php");
   }

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/erros.css" rel="stylesheet" type="text/css" />
<title>Upload</title>
</head>

<body>
<?php
	//session_start();	
	require ('connect.php');
	if(isset($_POST['fsub'])){
		// Pasta onde o arquivo vai ser salvo
		$_UP['pasta'] = '../../imgs/uploads/';
 	//echo "arq" .$_FILES['input-23']['name'] . "<br>";
 	//echo "arq" .$_POST['inputDescr'] . "<br>";
 	//echo "arq" .$_POST['inputData'] . "<br>";
 	//echo "arq" .$_FILES["input-23"]["name"];
		// Tamanho máximo do arquivo (em Bytes)
		$_UP['tamanho'] = 1000000; //Aprox 1mb

		//$_UP['renomeia'] = false;

		if(isset($_SESSION['atualiza']) && $_FILES['input-23']['error'] != 0 && $_SESSION['atualiza'] == 1){

			$card = $_POST['inputCard'];
			$desc = $_POST['inputDescr'];
			//$data = $_POST['inputData'];
			$destino = $_SESSION['image'];
			//$data = date('Y/m/d', strtotime($data));
			if(isset($_POST['inputData'])){

				if( $_POST['inputData'] != $_SESSION['datat']){
				$data = $_POST['inputData'];
				
				$data = date('Y/m/d', strtotime($data));
				$query = "update Cardapio set Descricao='".$desc."',Data='".$data."',Nome='".$card."' where _id = '".$_SESSION['idnum']."'";
				}
				else
					$query = "update Cardapio set Descricao='".$desc."',Nome='".$card."' where _id = '".$_SESSION['idnum']."'";
		
			}
			else{

				$query = "update Cardapio set Descricao='".$desc."',Nome='".$card."' where _id = '".$_SESSION['idnum']."'";

			}
			
			        $result = mysql_query($query);
				if(!$result){ //se tiver problemas, retorna falso
					echo '<div class="error">Cardápio não foi atualizado.</div>';
					echo "<meta http-equiv=\"refresh\" content=\"3; url=index.php \">";
					die ("Acesso à base de dados falhou: ".mysql_error());
				}
				echo '<div class="success">Cardápio atualizado com sucesso.</div>';
				echo "<meta http-equiv=\"refresh\" content=\"3; url=index.php \">";
				
				//echo "<img src=\"" . $destino . "\" />"
		}


		else if(isset($_SESSION['atualiza']) && $_FILES['input-23']['error'] == 0 && $_SESSION['atualiza'] == 1){

				$card = $_POST['inputCard'];
				$desc = $_POST['inputDescr'];
				//$data = $_POST['inputData'];

				
					$nome = $_FILES['input-23']['name'];
		
					$arquivo_tmp = $_FILES['input-23']['tmp_name'];
    
			//$extensao = strtolower(end(explode('.', $_FILES['input-23']['name'])));
				$extensao = strrchr($nome, '.');
			// Pega a extensao
			//$extensao = strrchr($nome, '.');

			// Converte a extensao para minusculo
					$extensao = strtolower($extensao);
			
			
					$novoNome = md5(microtime()) .$extensao;
			
					$destino = $_UP['pasta'] . $novoNome;

				if(move_uploaded_file( $arquivo_tmp, $destino)){

				

				if(isset($_POST['inputData'])){

					if( $_POST['inputData'] != $_SESSION['datat']){
						$data = $_POST['inputData'];
				
						$data = date('Y/m/d', strtotime($data));
						$query = "update Cardapio set Descricao='".$desc."',Data='".$data."',Nome='".$card."', img_url='".$destino."' where _id = '".$_SESSION['idnum']."'";
					}
					else
						$query = "update Cardapio set Descricao='".$desc."',Nome='".$card."', img_url='".$destino."' where _id = '".$_SESSION['idnum']."'";
		
				}
				else{
				//$destino = $_SESSION['image'];
				//$data = date('Y/m/d', strtotime($data));

			//echo $destino;
					
				
					$query = "update Cardapio set Descricao='".$desc."',Nome='".$card."', img_url='".$destino."' where _id = '".$_SESSION['idnum']."'";}
				$result = mysql_query($query);
				if(!$result){ //se tiver problemas, retorna falso
					echo '<div class="error">Cardápio não foi atualizado.</div>';
				    echo "<meta http-equiv=\"refresh\" content=\"3; url=index.php \">";
					die ("Acesso à base de dados falhou (atualizacao): ".mysql_error());
				}
				echo '<div class="success">Cardápio atualizado com sucesso.</div>';
				echo "<meta http-equiv=\"refresh\" content=\"3; url=index.php \">";
				
				//echo "<img src=\"" . $destino . "\" />"

				}
		}

		else{
		//tratamento de erros
		////www.linhadecodigo.com.br/artigo/3578/php-upload-de-arquivos.aspx#ixzz3m0GSGDLP
			$_UP['erros'][0] = 'Não houve erro';
			$_UP['erros'][1] = 'O arquivo no upload é maior do que o limite do PHP';
			$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
			$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
			$_UP['erros'][4] = 'Não foi feito o upload do arquivo';
	
			if ($_FILES['input-23']['error'] != 0) {
				die("Não foi possível fazer o upload, erro:<br />" . $_UP['erros'][$_FILES['input-23']['error']]);
				echo '<div class="error">Cardápio não foi atualizado.</div>';
				echo "<meta http-equiv=\"refresh\" content=\"3; url=update_cardam.php \">";
				 // Para a execução do script
			}
			else if($_UP['tamanho'] < $_FILES['input-23']['size']){
				echo "arquivo muito grande";
				echo '<div class="error">Cardápio não foi atualizado.</div>';
				echo "<meta http-equiv=\"refresh\" content=\"3; url=update_cardam.php \">";
				
			}
			else if(!isset($_POST['inputCard']) || !isset($_POST['inputDescr']) || !isset($_POST['inputData']))
			{				echo "Faltam informações";
					echo '<div class="error">Cardápio não foi atualizado.</div>';
				echo "<meta http-equiv=\"refresh\" content=\"3; url=update_cardam.php \">";
						}
   
			else{
			$nome = $_FILES['input-23']['name'];
		
			$arquivo_tmp = $_FILES['input-23']['tmp_name'];
    
			//$extensao = strtolower(end(explode('.', $_FILES['input-23']['name'])));
			$extensao = strrchr($nome, '.');
			// Pega a extensao
			//$extensao = strrchr($nome, '.');

			// Converte a extensao para minusculo
			$extensao = strtolower($extensao);
			
			
			$novoNome = md5(microtime()) .$extensao;
			
			$destino = $_UP['pasta'] . $novoNome;
			//echo $destino;
			if(move_uploaded_file( $arquivo_tmp, $destino)){
				$card = $_POST['inputCard'];
				$desc = $_POST['inputDescr'];
				$data = $_POST['inputData'];
				
				$data = date('Y/m/d', strtotime($data));
				//echo $data;
				$query = "insert into Cardapio (_id,Descricao,Data,Nome,img_url) values  (NULL, '".$desc."', '".$data."', '".$card."', '".$destino."')";
				$result = mysql_query($query);
				if(!$result){ //se tiver problemas, retorna falso
					echo '<div class="error">Cardápio não foi atualizado.</div>';
				echo "<meta http-equiv=\"refresh\" content=\"3; url=index.php \">";
					die ("Acesso à base de dados falhou (novo): ".mysql_error());
				}
				echo '<div class="success">Cardápio salvo com sucesso.</div>';
				echo "<meta http-equiv=\"refresh\" content=\"3; url=index.php \">";
				//echo "Arquivo salvo com sucesso.";
				//echo "<img src=\"" . $destino . "\" />";
			}
		}


	}}
	
?>
</body>
</html>
