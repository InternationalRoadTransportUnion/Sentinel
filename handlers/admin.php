<?php

$this->require_admin ();

if (! @file_exists ('conf/app.' . $this->app . '.' . ELEFANT_ENV . '.php')) {
	$this->redirect ('/' . $this->app . '/admin/settings');
}

$page->layout = 'admin';
$page->add_style ('/apps/' . $this->app . '/css/admin.css');
$page->title = Appconf::get ($this->app, 'Admin', 'name') . ' - ' . __ ('Control Panel');

echo $tpl->render (
	$this->app . '/admin',
	array (
		'version' => Appconf::get ($this->app, 'Admin', 'version'),
		'api_key_local' => $appconf['Global']['api_key_local']
	)
);