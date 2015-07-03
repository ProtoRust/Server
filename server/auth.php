<?php


	$authState 	= function($session) {
		$state 	= null;

		if (isset($_SESSION['token'])) {
			$token 	= $_SESSION['token'];
			$cert 	= realpath("../server/$token");

			if (!$cert) {
				error_log("Bad Token: $token");
				$state 	= -1;
				break 1;
			}

			$cert 	= file_get_contents($cert);
			if (!$cert) {
				error_log("Bad Cert: $token");
				$state 	= -2;
				break 1;
			}

			$cert 	= ($cert == $token);
			if (!$cert) {
				error_log("Token doest match Cert: $cert != $token");
				$state 	= -3;
				break 1;
			}

			$state 		= 1;
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
				$state 	= -4;
				break 1;
			}

			$generateToken 	= function($username, $password) {
				return md5(sha1($username).$username.sha1($password.$username));
			};

			$token 			= $generateToken($username, $password);
			$cert 			= realpath("../server/$token");

			if (!$cert) {
				error_log("Bad Token: $token");
				$state 	= -1;
				break 1;
			}

			$cert 	= file_get_contents($cert);
			if (!$cert) {
				error_log("Bad Cert: $token");
				$state 	= -2;
				break 1;
			}

			$cert 	= ($cert == $token);
			if (!$cert) {
				error_log("Token doest match Cert: $cert != $token");
				$state 	= -3;
				break 1;
			}

			$state 			= 1;
			$_SESSION['token']	= $token;
		} else {
			$state 			= 0;
		}

		return $state;
	};

	$authCheck	= function($stateHandler) {
		session_start();
		$state 	= $stateHandler($_SESSION);

		if ($state === 1) {
			define('AUTH', true);
		} elseif ($state === 0) {
			define('AUTH', false);
		} else {
			define('AUTH', 'error');
		}

		return $state;
	};



	return $authCheck($authState);

?>