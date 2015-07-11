<?php

	$loadLibraries 	= function() {

		$library 	= [
			'logger',
			'events',
			'checkinHandler'
		];

		$errors 	= [];

		foreach ($library as $lib) {
			$path 	= realpath("../server/library/$lib.php");
			if (!$path) {
				$errors[]	= "Could not find library: $lib";
				continue;
			}

			if (!include($path)) {
				$errors[] 	= "Could not include library: $path";
			}
		}

		return $errors;
	};

	return $loadLibraries();

?>