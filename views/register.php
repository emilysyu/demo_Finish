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
		<form method="POST" action="/EasyMVC_/register/newmember">
			<h1>Register Form</h1>
			<div>
				<input type="text" id="Username" name = "Username" />
			</div>
			<div>
				<input type="password" id="Password" name = "Password" />
			</div>
			<div>
				<input type="submit" name="register" value="register"  />
				
			</div>
		</form><!-- form -->
		<div class="button">
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
        <script src="/EasyMVC_/viewsjs/index.js"></script>
  </body>
</html>
