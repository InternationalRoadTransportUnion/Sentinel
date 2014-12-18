<?php

$this->require_admin ();

$page->layout = 'admin';
$page->add_style ('/apps/' . $this->app . '/css/admin.css');
$page->title = 'Sentinel' . ' - ' . __ ('Settings');

$form = new Form ('post', $this);

$form->data = array (
	'is_active' => $appconf['Global']['is_active'],
	'proxy_url' => $appconf['Global']['proxy_url'],
	'proxy_port' => $appconf['Global']['proxy_port'],
	'ips_allowed' => $appconf['Global']['ips_allowed'],
	'api_keys' => $appconf['Global']['api_keys'],
	'api_key_local' => $appconf['Global']['api_key_local'],
	'is_active_local' => $appconf['Local']['is_active'],
	'is_active_abusechdrone' => $appconf['AbuseChDrone']['is_active'],
	'is_active_abusechhttpbl' => $appconf['AbuseChHttpbl']['is_active'],
	'is_active_abusechspam' => $appconf['AbuseChSpam']['is_active'],
	'is_active_abusechzeustracker' => $appconf['AbuseChZeustracker']['is_active'],
	'is_active_ahbl' => $appconf['AbusiveHostsBlockingList']['is_active'],
	'is_active_blocklistde' => $appconf['BlocklistDe']['is_active'],
	'is_active_botscout' => $appconf['BotScout']['is_active'],
	'apikey_botscout' => $appconf['BotScout']['apikey'],
	'is_active_dronebl' => $appconf['DroneBl']['is_active'],	
	'is_active_efnetrbl' => $appconf['EfnetRbl']['is_active'],
	'is_active_fspamlist' => $appconf['FSpamlist']['is_active'],
	'apikey_fspamlist' => $appconf['FSpamlist']['apikey'],
	'is_active_projecthoneypot' => $appconf['ProjectHoneyPot']['is_active'],
	'apikey_projecthoneypot' => $appconf['ProjectHoneyPot']['apikey'],
	'is_active_sorbsproblems' => $appconf['SorbsProblems']['is_active'],
	'is_active_sorbsspews' => $appconf['SorbsSpews']['is_active'],
	'is_active_spamcop' => $appconf['SpamCop']['is_active'],
	'is_active_spamhaus' => $appconf['Spamhaus']['is_active'],
	'is_active_stopforumspam' => $appconf['StopForumSpam']['is_active'],
	'is_active_tornevall' => $appconf['Tornevall']['is_active']
);

echo $form->handle (function ($form) {
	
	$merged = Appconf::merge ($this->app, array (
		'Global' => array (
			'is_active' => (filter_input (INPUT_POST, 'is_active', FILTER_SANITIZE_STRING) === 'yes') ? true : false,
			'proxy_url' => filter_input (INPUT_POST, 'proxy_url', FILTER_SANITIZE_STRING),
			'proxy_port' => filter_input (INPUT_POST, 'proxy_port', FILTER_SANITIZE_STRING),
			'ips_allowed' => filter_input (INPUT_POST, 'ips_allowed', FILTER_SANITIZE_STRING),
			'api_keys' => filter_input (INPUT_POST, 'api_keys', FILTER_SANITIZE_STRING),
			'api_key_local' => filter_input (INPUT_POST, 'api_key_local', FILTER_SANITIZE_STRING)
		),
		'Local' => array (
			'is_active' => (filter_input (INPUT_POST, 'is_active_local', FILTER_SANITIZE_STRING) === 'yes') ? true : false
		),
		'AbuseChDrone' => array (
			'is_active' => (filter_input (INPUT_POST, 'is_active_abusechdrone', FILTER_SANITIZE_STRING) === 'yes') ? true : false
		),
		'AbuseChHttpbl' => array (
			'is_active' => (filter_input (INPUT_POST, 'is_active_abusechhttpbl', FILTER_SANITIZE_STRING) === 'yes') ? true : false
		),
		'AbuseChSpam' => array (
			'is_active' => (filter_input (INPUT_POST, 'is_active_abusechspam', FILTER_SANITIZE_STRING) === 'yes') ? true : false
		),
		'AbuseChZeustracker' => array (
			'is_active' => (filter_input (INPUT_POST, 'is_active_abusechzeustracker', FILTER_SANITIZE_STRING) === 'yes') ? true : false
		),
		'AbusiveHostsBlockingList' => array (
			'is_active' => (filter_input (INPUT_POST, 'is_active_ahbl', FILTER_SANITIZE_STRING) === 'yes') ? true : false
		),		
		'BlocklistDe' => array (
			'is_active' => (filter_input (INPUT_POST, 'is_active_blocklistde', FILTER_SANITIZE_STRING) === 'yes') ? true : false
		),	
		'BotScout' => array (
			'is_active' => (filter_input (INPUT_POST, 'is_active_botscout', FILTER_SANITIZE_STRING) === 'yes') ? true : false,
			'apikey' => filter_input (INPUT_POST, 'apikey_botscout', FILTER_SANITIZE_STRING)
		),
		'DroneBl' => array (
			'is_active' => (filter_input (INPUT_POST, 'is_active_dronebl', FILTER_SANITIZE_STRING) === 'yes') ? true : false
		),		
		'EfnetRbl' => array (
			'is_active' => (filter_input (INPUT_POST, 'is_active_efnetrbl', FILTER_SANITIZE_STRING) === 'yes') ? true : false
		),
		'FSpamlist' => array (
			'is_active' => (filter_input (INPUT_POST, 'is_active_fspamlist', FILTER_SANITIZE_STRING) === 'yes') ? true : false,
			'apikey' => filter_input (INPUT_POST, 'apikey_fspamlist', FILTER_SANITIZE_STRING)
		),
		'ProjectHoneyPot' => array (
			'is_active' => (filter_input (INPUT_POST, 'is_active_projecthoneypot', FILTER_SANITIZE_STRING) === 'yes') ? true : false,
			'apikey' => filter_input (INPUT_POST, 'apikey_projecthoneypot', FILTER_SANITIZE_STRING)
		),
		'SorbsProblems' => array (
			'is_active' => (filter_input (INPUT_POST, 'is_active_sorbsproblems', FILTER_SANITIZE_STRING) === 'yes') ? true : false
		),
		'SorbsSpews' => array (
			'is_active' => (filter_input (INPUT_POST, 'is_active_sorbsspews', FILTER_SANITIZE_STRING) === 'yes') ? true : false
		),
		'SpamCop' => array (
			'is_active' => (filter_input (INPUT_POST, 'is_active_spamcop', FILTER_SANITIZE_STRING) === 'yes') ? true : false
		),
		'Spamhaus' => array (
			'is_active' => (filter_input (INPUT_POST, 'is_active_spamhaus', FILTER_SANITIZE_STRING) === 'yes') ? true : false
		),
		'StopForumSpam' => array (
			'is_active' => (filter_input (INPUT_POST, 'is_active_stopforumspam', FILTER_SANITIZE_STRING) === 'yes') ? true : false
		),
		'Tornevall' => array (
			'is_active' => (filter_input (INPUT_POST, 'is_active_tornevall', FILTER_SANITIZE_STRING) === 'yes') ? true : false
		),
	));

	if (! Ini::write ($merged, 'conf/app.' . $this->app . '.' . ELEFANT_ENV . '.php')) {
		printf ('<p>%s</p>', __ ('Unable to save settings. Check your folder permissions and try again.'));
		return;
	}

	$form->controller->add_notification (__ ('Settings saved.'));
	$form->controller->redirect ('/' . $this->app . '/admin');
	
});