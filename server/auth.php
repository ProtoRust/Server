<?php

	$auth = function() {
		$username 	= (isset($_REQUEST['username']))
			? $_REQUEST['username']
			: null
		;

		$password 	= (isset($_REQUEST['password']))
			? ($_REQUEST['password'])
			: null
		;

		if (!$username or !$password) {
			if (!isset($_SESSION['token'])) return false;
			$token 		= $_SESSION['token'];
		} else {

			$generateToken 	= function($username, $password) {
				return md5(sha1($username).$username.sha1($password.$username));
			};

			$token 		= $generateToken($username, $password);
			$cert 		= realpath("../server/$token");
			if (!$cert) return false;

			$cert 		= trim(file_get_contents($cert));
			if (!$cert) return false;
			if ($cert !== $token) return false;

			$_SESSION['token'] 	= $token;
			return $token;
		}

		return $token;
	};

	return $auth();
?>