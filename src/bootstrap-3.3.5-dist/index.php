<?php
	session_start();
	//echo $_SESSION['user'];
	require 'function.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"> 
        <meta charset="utf-8">
        <title>RU</title>
        <meta name="generator" content="Bootply" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="description" content="Example of using CSS only for masonry / isotope style layout with Bootstrap panels." />
        <link href="css/bootstrap.min.css" rel="stylesheet">
        
        <!--[if lt IE 9]>
          <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <link rel="apple-touch-icon" href="/bootstrap/img/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/bootstrap/img/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/bootstrap/img/apple-touch-icon-114x114.png">

		<link href="css/font-awesome.min.css" type="text/css" rel="stylesheet">
        <link href="css/index.css" rel="stylesheet">   
		<link href="css/bootstrap.min.css" rel="stylesheet">
  
		<link href="css/signin.css" rel="stylesheet">
		<script src="http://code.jquery.com/jquery-1.10.1.min.js" ></script>    



    </head>
        
    <body>


        
        <!--template-->
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
                <li class="active"><a href="#" class="" style="">Explore</a>
                
                </li>
		<?php
			if(isset($_SESSION['user']))
                		echo "<li><a href=".'new_cardam.php'.">Gerenciar</a>";
		?>

                </li>
		<?php
                	if(!isset($_SESSION['user']))
				echo "<li><a href=".'#myModal'." data-toggle=".'modal'." data-target=".'#myModal'.">Log in</a>";
			else
                		echo "<li><a href=".'sair.php'.">Log out</a>";
				
		?>
                </li>
            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
</div>
<div class="container">
    <div class="col-md-12">
        <div class="center-block text-center">
        	<h1>Restaurante universitário UFFS</h1>
        </div>
        <div class="container">
            <div class="menu row">
                <div class="product col-sm-6">

			<?php
					if(isset($_GET['id']))
						$qrySQL = 'SELECT * FROM Cardapio WHERE _id='.$_GET['id'];	
					else
						$qrySQL = 'SELECT * FROM Cardapio WHERE Data = (SELECT max(Data) FROM Cardapio)';
						
					$rs = mysql_query($qrySQL);
			
		    		if($row = mysql_fetch_array($rs)){
		
	        			echo '<img class="img-responsive" src='.$row['img_url'].'><hr>
						<h2>'.$row['Nome'].'</h2>
						<p>'.$row['Descricao'].'';  		
			    	}	
	
		  	?>
		  
                    <hr>
			<button type="button" onclick="like()" class="btn btn-primary btn-lg">Gostei</button>	<span id="ok"></span>

                   	<button class="btn btn-primary btn-lg " id=dislike value="dislike">Não gostei</button>
		          
	            <hr>
                   
                    <!-- aqui é onde vai os comentários -->
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#reviews">Reviews</a></li>
                        <li><a data-toggle="tab" href="#details">Details</a></li>
                    </ul>
                  
                     <!-- Aqui é onde termina os comentários -->
                    
                </div>
                <div class="col-sm-6">
                    <div class="productsrow">
			<?php
				$rs = cardapio();
				while($row = mysql_fetch_array($rs)){
					$data = split('-', $row['Data']);
					echo '<div class="product menu-category">
                             		      <div class="menu-category-name list-group-item active">'.$row['Nome'].'</div>
                            		      <div class="product-image">
                                           	<img class="product-image menu-item list-group-item" src='.$row['img_url'].'>
                            		      </div>
					      <a href="index.php?id='.$row['_id'].'" class="menu-item list-group-item">'.date("l", mktime(0, 0, 0, $data[1], $data[2], $data[0])).'<span class="badge">'.$row['Data'].'</span></a>
 			                      </div>';
				}
			?>
                </div>
            </div>
            <!--/row-->
        </div>
        <!--/container-->
    </div>
</div>

<hr>



<div class="modal fade" id="myModal">
	<div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title">Log In</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">

			<form class="form-signin" action="authentication.php" method="POST">
				<h2 class="form-signin-heading">Login</h2>
				<label for="inputEmail" class="sr-only">Email</label>
        		<input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="e-mail" required autofocus>
        		<label for="inputPassword" class="sr-only">Senha</label>
        		<input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Senha" required>
		   </div>
			<div class="modal-footer">
			<button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
			</form>
        </div>
      </div>
    </div>
</div>



<!--/template-->
        
        <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>


        <script type='text/javascript' src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
        
        <!-- JavaScript jQuery code from Bootply.com editor  -->
        
        <script type='text/javascript'>
        
        $(document).ready(function() {
                      
        });
        
        </script>
        
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
          ga('create', 'UA-40413119-1', 'bootply.com');
          ga('send', 'pageview');
        </script>
        
    </body>
</html>
