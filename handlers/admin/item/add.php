<?php

$this->require_admin ();

$page->layout = 'admin';
$page->add_style ('/apps/' . $this->app . '/css/admin.css');
$page->title = Appconf::get ($this->app, 'Admin', 'name') . ' - ' . __ ('Add item');

$form = new Form ('post', $this);

echo $form->handle (function ($form) {

	$item = new Item (array (
		'action' => filter_input (INPUT_POST, 'notes', FILTER_SANITIZE_NUMBER_INT),
		'ip' => filter_input (INPUT_POST, 'ip', FILTER_SANITIZE_STRING),
		'created' => date (Appconf::get ($this->app, 'Formats', 'format_date_timestamp')), 
		'id2_country' => strtoupper (substr (filter_input (INPUT_POST, 'id2_country', FILTER_SANITIZE_STRING), 0, 2)),
		'email' => filter_input (INPUT_POST, 'email', FILTER_SANITIZE_STRING),
		'username' => filter_input (INPUT_POST, 'username', FILTER_SANITIZE_STRING),
		'notes' => filter_input (INPUT_POST, 'notes', FILTER_SANITIZE_STRING)
	));
	$item->put ();

	if ($item->error) {
		$form->controller->add_notification (__ ('Unable to save item, error') . '; ' . $item->error);
		return false;
	}

	Versions::add ($item);

	$form->controller->add_notification ( __ ('Item added'));
	$form->controller->redirect ('/' . $this->app . '/admin/item/browse');
	
});