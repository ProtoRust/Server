<?php

	$requests = function() {
		if ((isset($_REQUEST) and (count($_REQUEST) >= 1)) == false) return 0;

		return $_REQUEST;
	};

	return $requests();

?>