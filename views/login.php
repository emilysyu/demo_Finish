<?php session_start();?>
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
			<h1>Login Form</h1>
			<div>
				<input type="text" placeholder="Username" name="Username" id="Username" />
			</div>
			<div>
				<input type="password" placeholder="Password" name="Password" id="Password" />
			</div>
			<div>
				<input type="submit" name="Login"value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
        <script src="js/index.js"></script>
  </body>
</html>
