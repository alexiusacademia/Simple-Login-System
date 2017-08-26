<?php 
	/*******************************************************************
	* Title:        PHP Simple Login System
	* Description:  This is a simple login system I built using
	*               PHP, HTML, CSS & Javascript
	* Date:         August 26, 2017
	* Author:       Alexius Academia
	*               alexius.academia@gmail.com
	*               https://alexiusacademia.com
	*******************************************************************/

	/* Start the php session */
	session_start();

	require_once('helpers/functions.php');
	
	if ($_GET) {
		if (isset($_GET['q'])) {
			$action = $_GET['q'];

			switch ($action) {
				/*******************************************************
					Checks if user is logged in
				*******************************************************/
				case 'isLogged':
					
					$data = array();
					if (isset($_SESSION['username'])) {
						$data['isLogged'] = true;
					}else{
						$data['isLogged'] = false;
					}

					echo json_encode($data);
					break;
				
				default:
					header('Location: forbidden.html');
					break;
			}
		}
	}

	if ($_POST) {
		if (isset($_POST['q'])) {
			$action = $_POST['q'];
			switch ($action) {
				case 'login':
					$data = array();

					/***************************************************
						Get the username in password input
					***************************************************/
					$username = $_POST['username'];
					$password = $_POST['password'];

					/***************************************************
						Sanitize username and encrypt password
					***************************************************/
					$username = sanitize($username);
					$password = md5($password);

					/***************************************************
						This will be the sample user data instead of using a database
					***************************************************/
					$data = array(
						array( 'username' => 'user', 'password' => 'ee11cbb19052e40b07aac0ca060c23ee', 'nick' => 'User' ),
						array( 'username' => 'admin', 'password' => '21232f297a57a5a743894a0e4a801fc3', 'nick' => 'Admin' )
					);

					$found = false;						// TO know if username is found
					$pass = '';							// Store corresponding password of the username found


					/***************************************************
						Result array
					***************************************************/
					$result = array();

					foreach ($data as $val) {
						if ($val['username'] == $username) {
							$found = true;
							$result['found'] = true;
							$pass = $val['password'];
							$result['nick'] = $val['nick'];
							break;
						}
					}

					if ($found) {
						if ($pass == $password) {
							$result['authenticated'] = true;
							/***************************
								Set session variables
							***************************/
							$_SESSION['username'] = $username;
							$_SESSION['nick'] = $result['nick'];

						}else{
							$result['authenticated'] = false;
						}
					}

					echo json_encode($result);

					break;

				default:
					header('Location: forbidden.html');
					break;
			}
		}
	}


 ?>