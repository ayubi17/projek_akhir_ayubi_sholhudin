<!DOCTYPE html>
<html>
<head>
	<title>Rumikan|Sign Up</title>
	<link rel="stylesheet" type="text/css" href="regis.css">
</head>
<body>
<form action="cekregis.php" method="post">
	<div class="signup">
			<h1>Sign Up</h1>
			<div class="textbox">
				<input type="text" name="user"  placeholder="Username">
			</div>
			<div class="textbox">
				<input type="password" name="pass"  placeholder="Password">
			</div>
			<div class="textbox">
				<input type="text" name="name"  placeholder="Full Name">
				</div>
			<div class="textbox">
				<input type="email" name="email" placeholder="Email">
			</div>
			<div class="textbox">
				<input type="text" name="adress"  placeholder="Adress">
			</div>
			<div class="textbox">
				<input type="text" name="contact"  placeholder="Contact">
			</div>
			
			
			<input type="submit" name="kirim" value="Sign Up" id="btn">
	</div>
</form>
</body>
</html>