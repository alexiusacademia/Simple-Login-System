/***********************************************************************

	Check if user is logged-in on page load.

***********************************************************************/
$.ajax({
	url: 'api.php',
	type: 'get',
	data: {
		q:'isLogged'
	},
	success: function(data) {
		console.log(data);
		/***************************************************************
			Get the result from the query
		****************************************************************/
		var result = JSON.parse(data);

		/***************************************************************
			If the result is true, show the login form,
			otherwise, hide it and show the main content.
		****************************************************************/
		if (result.isLogged) {
			$('#login-form').hide();
			$('#main-content').show();
		}else{
			$('#main-content').hide();
			$('#login-form').show();
		}
	}
});


/***********************************************************************

	Submit the login data

***********************************************************************/
$('#sign-in').on('click', function(){

	/* Clear error message */
	$('#login-message').text('');

	/* Get the inputs by the user */
	var username = $('#input-username').val();
	var password = $('#input-password').val();

	$.ajax({
		url: 'api.php',
		type: 'post',
		data: {
			q:'login',
			username : username,
			password : password
		},
		success: function(data) {
			var result = JSON.parse(data);

			console.log(result);

			if (result.found) {
				if (result.authenticated) {
					$('#login-form').hide();
					$('#main-content').show();
				} else {
					$('#login-message').text('Login failed!. Password incorrect.');
				}
			} else {
				$('#login-message').text('Login failed!. User doesn\'t exist.');
			}

		}
	});
});


/*
	This will clear error message while the user is typing
*/
$('input').keyup(function(){
	$('#login-message').text('');
});



