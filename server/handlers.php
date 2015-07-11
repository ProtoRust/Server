<?php

	$loadHandlers 	= function() {

		$handlers 	= [
			'Init',
			'OnPlayerInit',
			'OnPlayerDisconnected',
			'OnPlayerRespawned'
		];

		$errors 	= [];

		foreach ($handlers as $handler) {
			$path 	= realpath("../server/handlers/$handler.php");
			if (!$path) {
				$errors[]	= "Could not find handler: $handler";
				continue;
			}

			if (!include($path)) {
				$errors[] 	= "Could not initialize handler: $path";
			}
		}

		return $errors;
	};

	return $loadHandlers();

?>