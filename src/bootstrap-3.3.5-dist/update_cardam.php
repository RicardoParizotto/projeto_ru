<?php

  session_start();
  if(!isset($_SESSION['user']) OR !isset($_SESSION['pass'])){
		//echo "<meta http-equiv=\"refresh\" content=\"0; url=index.php \">";
		header("Location: index.php");
   }
  include('connect.php');
  //$iden = $_SESSION['id'];
  $iden = 4;
  $timezone = "America/Sao_Paulo";
  date_default_timezone_set($timezone);
  $today = date("d-m-Y");
  
  //$query = "insert into Cardapio (_id,Descricao,Data,Nome,img_url) values  (NULL, '".$desc."', '".$data."', '".$card."', '".$destino."')";
  $query = "select * from Cardapio where _id = '".$iden."'";
  $result = mysql_query($query);
   if(!$result){ //se tiver problemas, retorna falso
		die ("Acesso à base de dados falhou: ".mysql_error());
	}
	
	
	while($row = mysql_fetch_array($result)){
		$id = $row['_id'];
		$descr = $row['Descricao'];
		$data = $row['Data'];
		$name = $row['Nome'];
		$img = $row['img_url'];
	
	
	}$data = date('d/m/Y', strtotime($data));$_SESSION['image'] = $img;$_SESSION['datat'] = $data; 
	?>

<!DOCTYPE html>
<html lang="en" class="no-js">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
     <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
	<link rel="stylesheet" href="css/datepicker.css">

    <meta name="description" content="">
    <meta name="author" content="">
 
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
    <script src="js/jquery.min.js"></script>
    <script src="js/fileinput.js" type="text/javascript"></script>
    <script src="js/fileinput_locale_fr.js" type="text/javascript"></script>
    <script src="js/fileinput_locale_es.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
	<script src="js/bootstrap-datepicker.js"></script>
    <title>Atualização de cadastro</title>

    <!-- Bootstrap core CSS -->
   <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

   

  </head>

  <body>
	<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container" style="">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" style="">
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.php" class="" style="">Explore</a>
                
                </li>
                <li><a href="statistics.php" class="">Estatísticas</a>

                </li>
                <li><a href="sair.php">Sign out</a>

                </li>
            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
</div>

    <div class="container">

	


	<section>				
                <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">

      				<form action="upload.php" method="post" enctype="multipart/form-data">
		
        			 <header><h1 id="cc"><span>Atualização</span></h1></header>

				 <p> 
                                    <label for="inputCard" class="uname" data-icon="" >Nome</label>
                                    <input id="inputCard" name="inputCard" value="<?php echo $name;?>" required="true"/>
                                </p>
				<p> 
						<label for="inputDescr" class="uname" data-icon="" > Descrição</label>
						<input id="inputDescr" rows="5" name="inputDescr" value="<?php echo $descr;?>" >
                                   
                                </p>	
				<p>
				<label class="control-label"> Data</label>
				<input  type="text"value="<?php echo $data; ?>" id="inputData" name="inputData" readonly='true'>
				 <script type="text/javascript">
            				// When the document is ready
					
            				$(document).ready(function () {
                
                				$('#inputData').datepicker({
                    					format: "dd/mm/yyyy"
                				}).on('changeDate', function(e){
    							$(this).datepicker('hide');
						});
            
            				});
					
        			</script>
				
			    	</p>
				
    				<input id="input-23" name="input-23" type="file" multiple=true class="file-loading" value="<?php echo $img; ?>">
    				<script>
    					$(document).on('ready', function() {
        					$("#input-23").fileinput({
            						showUpload: true,
	     						allowedFileExtensions: ["jpg", "gif", "png", "jpeg"],
                       					browseClass: "btn btn-info",
        						browseLabel: "Nova Imagem",
        						browseIcon: "<i class=\"glyphicon glyphicon-picture\"></i> ",
            						layoutTemplates: {
                						main1: "{preview}\n" +
               								 "<div class=\'input-group {class}\'>\n" +
               								 "   <div class=\'input-group-btn\'>\n" +
                						"       {browse}\n" +
                       
                
                						"   </div>\n" +
                						"   {caption}\n" +
               							 "</div>"
            						}
       						 });
    						});
    				</script>
					<br>

      				<p class="login button"> 
                                    <input type="submit" value="Atualizar" name="fsub" id="fsub" Onclick="<?php $_SESSION['atualiza'] = 1; $_SESSION['idnum'] = $iden ?> /> 
								</p>
			</form>

	         </div>
		</div>
        	</div>
        </section>
      

    </div> <!-- /container -->
	



    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>


