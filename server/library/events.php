<?php

	function registerHook($eventName, $callbackFunction) {
		global $hooks;

		if (!$hooks) $hooks 	= [];
		$hooks[$eventName][]	= $callbackFunction;

		return true;
	}

	function raiseEvent($eventName, array $param = array()) {
		global $hooks;
		if (!isset($hooks[$eventName])) return false;

		$results		= [];
		foreach ($hooks[$eventName] as $callback) {
			$results[]	= $callback($param);
		}

		return $results;
	}

?>