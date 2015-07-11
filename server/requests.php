<?php

	$requests = function() {
		if ((isset($_REQUEST) and (count($_REQUEST) >= 1)) == false) return 0;

		return $_REQUEST;
	};

	function handleRequest($requests, &$logger) {
		$logger("Request: " . json_encode($requests), "requests", 3);

		$handler 	= new checkinHandler($requests, $logger);
		$event 		= (isset($requests['event'])) ? $requests['event'] : null;
		if (!$event) return true;

		return true;
	};

	return $requests();

?>