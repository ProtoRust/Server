<?php

	class checkinHandler {

		public 		$token;
		public 		$event;

		protected 	$logger;
		protected 	$request;
		protected 	$data;

		private 	$errors				= [];
		private 	$commands			= [];
		private 	$msgs				= [];

		function __construct($request, logger &$logger) {
			$this->request 	= $request;
			$this->logger 	= $logger;

			if (isset($request['token'])) {
				$this->token 	= $request['token'];
				unset($request['token']);
			}

			if (isset($request['event'])) {
				$this->event 	= $request['event'];
				unset($request['event']);
			}

			$this->data 	= $request;
			
			$this->processEvent();
			$this->sendResponse();
		}

		private function processEvent() {
			if ($this->event == 'checkin') return false;
			raiseEvent($this->event, $this->data);
		}

		function sendResponse() {
			$resp 	= [
				'errors'		=> $this->errors,
				'commands'		=> $this->commands,
				'msgs' 			=> $this->msgs,
				'event'			=> $this->event,
				'token'			=> $this->token,
				'data'			=> $this->data
			];

			$enc 	= json_encode($resp);
			$this->logger->log("Sending: $enc", 'responses', 3);

			print $enc;
			exit();
		}

	}

?>