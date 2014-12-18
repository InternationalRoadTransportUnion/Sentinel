<?php

$page->title = Appconf::get ($this->app, 'Admin', 'name') . ' - ' . __ ('Check IPs');

$form = new Form ('post', $this);

echo $form->handle (function ($form) use ($appconf, $tpl) {

	$results = array ();
	if (($ips_cgi = filter_input (INPUT_POST, 'ips', FILTER_SANITIZE_STRING))) {
		if (($ips = explode ("\r", $ips_cgi))) {
			$sentinel = new SentinelService ();			
			foreach ($ips as $ip) {
				$ip = trim ($ip);
				if (! filter_var ($ip, FILTER_VALIDATE_IP)) {
					$results[] = array (
						'ip' => $ip,
						'error_message' => __ ('Bad IP format')
					);
				} else {
					$validation_result = $sentinel->validate ($ip);
					$pots = array ();
					if (($error = Sentinel\Error::get_error_message ())) {
						$results[] = array (
							'ip' => $ip,
							'error_message' => $error
						);
					} else {
						if ($validation_result['score']) {
							foreach ($validation_result['checkers'] as $result) {
								if ($result['spammer_found']) {
									$pots[] = $result['name'];
								}
							}
						}
						$results[] = array (
							'ip' => $ip,
							'score' => $validation_result['score'],
							'pots' => (array () === $pots) ? '' : implode (', ', $pots)
						);
					}
				}
			}
		}
	}	
	echo $tpl->render (
		$this->app . '/check/ip',
		array (
			'ips' => $ips_cgi,
			'results' => $results,
			'api_key_local' => $appconf['Global']['api_key_local']
		)
	);

	$form->controller->add_notification ( __ ('Checking done'));
	
});