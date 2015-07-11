<?php

	$initCallback 	= function(array $args = array()) {
		global $logger;
		
		$logger->log("Client Initialized", "client_events", 1);
	};

	return registerHook('Init', $initCallback);
?>