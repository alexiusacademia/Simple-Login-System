
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<title>Alex - Simple Login System</title>
</head>
<body>

	<div class="title">Simple Login System</div>

	<!-- Login Form -->
	<div class="login-form" id="login-form">
		<div class="login-title">
			Login
		</div>
		<div>
			<span id="login-message"></span>
		</div>
		<div>
			<input type="text" name="input-username" id="input-username" placeholder="Username">
		</div>
		<div>
			<input type="password" name="input-password" id="input-password" placeholder="Password">	
		</div>
		<div>
			<button id="sign-in">Sign In</button>	
		</div>
	</div>



	<!-- Main Content -->
	<div class="main-content" id="main-content">
		<h2>Welcome to my Portal</h2>

		<div class="description">
			<p>
				You have successfully logged in to my virtual portal created 
				for trial programming for Australian Waste Management Pty Ltd.
			</p>
			<p>
				This little program demonstrates a simple login system that implements session. This uses the JQUERY library for implementing AJAX calls from a PHP api for logging in. This uses a hardcoded user data instead of using a database to show some basic PHP usage in login systems.
			</p>
			<p>
				The codes are separated in a way that separates view from programming logic. 
			</p>
			<p>
				You can continue to my personal website at <a href="https://alexiusacademia.com">Alexius Academia</a>.
			</p>
			<p>
				To logout from the session, please click <a href="logout.php">Log Out</a>.
			</p>
		</div>
	</div>

	<div class="credits">
		Alexius Academia <br>
		<em>Copyright &copy;</em>
	</div>


	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/app.js"></script>

</body>
</html>