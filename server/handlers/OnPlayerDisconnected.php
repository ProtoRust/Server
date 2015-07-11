<?php

	$onPlayerDisconnectedCallback 	= function(array $args = array()) {
		
	};

	return registerHook('OnPlayerDisconnected', $onPlayerDisconnectedCallback);
?>