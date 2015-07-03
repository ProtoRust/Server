<?php

	$authCheck	= function() {
		session_start();

		$state 	= $authState($_SESSION);

		if ($state === 1) {
			define('AUTH', true);
		} elseif ($state === 0) {
			define('AUTH', false);
		} else {
			define('AUTH', 'error');
		}

		return $state;
	};

	$authState 	= function($session) {
		$authState 	= null;

		if (isset($_SESSION['token'])) {
			$token 	= $_SESSION['token'];
			$cert 	= realpath("../server/$token");

			if (!$cert) {
				error_log("Bad Token: $token");
				$authState 	= -1;
				break 1;
			}

			$cert 	= file_get_contents($cert);
			if (!$cert) {
				error_log("Bad Cert: $token");
				$authState 	= -2;
				break 1;
			}

			$cert 	= ($cert == $token);
			if (!$cert) {
				error_log("Token doest match Cert: $cert != $token");
				$authState 	= -3;
				break 1;
			}

			$authState 		= 1;
		} elseif (isset($_REQUEST['token']) and $_REQUEST['token'] == 0) {
			$username 		= (isset($_REQUEST['username']))
				? $_REQUEST['username']
				: null
			;

			$password 		= (isset($_REQUEST['password']))
				? $_REQUEST['password']
				: null
			;

			if (!$username or !$password) {
				error_log("Bad username or password");
				$authState 	= -4;
				break 1;
			}

			$generateToken 	= function($username, $password) {
				return md5(sha1($username).$username.sha1($password.$username));
			};

			$token 			= $generateToken($username, $password);
			$cert 			= realpath("../server/$token");

			if (!$cert) {
				error_log("Bad Token: $token");
				$authState 	= -1;
				break 1;
			}

			$cert 	= file_get_contents($cert);
			if (!$cert) {
				error_log("Bad Cert: $token");
				$authState 	= -2;
				break 1;
			}

			$cert 	= ($cert == $token);
			if (!$cert) {
				error_log("Token doest match Cert: $cert != $token");
				$authState 	= -3;
				break 1;
			}

			$authState 			= 1;
			$_SESSION['token']	= $token;
		} else {
			$authState 			= 0;
		}


		return $authState;
	};


	return $authCheck();

?>