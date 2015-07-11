<?php

	class logger {

		protected $folder;
		protected $ready;

		public $printLevel;

		public function __construct($folder, $level = 1) {
			$this->folder 		= realpath($folder);
			$this->ready 		= (!$folder) ? false : true;
			$this->printLevel	= $level;
		}

		public function __invoke($text, $logName = '', $level = 1) {
			if (!$this->ready) return false;
			if (!$logName) $logName = 'system';

			try {
				$path 		= "{$this->folder}/$logName.log";
				$sep 		= " | ";
				if (!file_exists($path)) touch($path);

				$ip 		= $_SERVER['REMOTE_ADDR'];
				$msg 		= date("Y-m-d").$sep.date("H:i:s")."$sep$ip$sep$text\r\n";
				$log 		= fopen($path, 'a+');

				fwrite($log, $msg);
				fclose($log);
				return $msg;
			} catch(Exception $e) {
				return $e->getMessage();
			}
		}

		public function log($text, $name, $level = 1) {
			return $this($text, $name, $level);
		}
	}

?>