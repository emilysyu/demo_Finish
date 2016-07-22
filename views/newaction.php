<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Login form using HTML5 and CSS3</title>
        <link rel="stylesheet" href="css/style.css">

  </head>

  <body>

    <body>
<div class="container">
	<section id="content">
		<form method="POST" action="../controllers/dbcrud.php">
			<h1>New Action</h1>
			<div>
				<input type="text" name="Who" placeholder="Who" id="Who" />
			</div>
			<div>
				<input type="text" name="Action" placeholder="Action" id="Action" />
			</div>
			<div>
				<input type="text" name="Time" placeholder="Time" id="Time" />
			</div>
			<div>
				<input type="submit" name="newAction" value="action" />
			</div>
		</form><!-- form -->
		
	</section><!-- content -->
</div><!-- container -->
</body>
    
        <script src="js/index.js"></script>

    
    
    
  </body>
</html>
