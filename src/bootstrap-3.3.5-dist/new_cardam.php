
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Adicionar cardápio</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <div class="container">

      <form class="form-signin" action="upload.php" method="POST">
        <h2 class="form-signin-heading"></h2>
        <label for="inputEmail" class="sr-only"></label>
        <input type="text" id="inputCard" name="inputCard" class="form-control" placeholder="Caaaardápio" required autofocus>
		    <label class="control-label">Select IMG</label>
			<input id="input-20" type="file" class="file-loading">
			    <label class="control-label">Select File</label>
				<input id="input-21" type="file" accept="image/*" class="file-loading">
				<script>
					$(document).on('ready', function() {
						$("#input-21").fileinput({
							allowedFileExtensions: ["jpg", "gif", "png", "txt"]
							previewFileType: "image",
							browseClass: "btn btn-success",
							browseLabel: "Pick Image",
							browseIcon: "<i class=\"glyphicon glyphicon-picture\"></i> ",
							removeClass: "btn btn-danger",
							removeLabel: "Delete",
							removeIcon: "<i class=\"glyphicon glyphicon-trash\"></i> ",
							uploadClass: "btn btn-info",
							uploadLabel: "Upload",
							uploadIcon: "<i class=\"glyphicon glyphicon-upload\"></i> "
						});
					});
				</script>
        
      
        <button class="btn btn-lg btn-primary btn-block" type="submit">Adicionar</button>
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>

