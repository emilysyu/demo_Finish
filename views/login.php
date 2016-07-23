<?php session_start();?>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Login form using HTML5 and CSS3</title>
    
        <link rel="stylesheet" href="/EasyMVC_/views/css/style.css">
  </head>

  <body>
    <body>
<div class="container">
	<section id="content">
		<form method="POST" action="/EasyMVC_/login/login">
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
        <script src="/EasyMVC_/views/js/index.js"></script>
  </body>
</html>
