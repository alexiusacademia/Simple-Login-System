<?php 

	/*
		Function to demostrate a very basic string sanitation
	*/
	function sanitize($str) {
		$str = htmlspecialchars($str);

		return $str;
	}


 ?>