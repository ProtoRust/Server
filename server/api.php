<?php

	$requests = function() {
		if ((isset($_REQUEST) and (count($_REQUEST) >= 1)) == false) return false;

		return $_REQUEST;
	};

	return $requests();

?>