<?php

$this->require_admin ();

$page->layout = 'admin';
$page->add_style ('/apps/' . $this->app . '/css/admin.css');
$page->title = Appconf::get ($this->app, 'Admin', 'name') . ' - ' . __ ('Edit item');

$form = new Form ('post', $this);

if (! ($id = filter_input (INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT))) {
	$form->controller->add_notification (__ ('Empty ID'));
	$form->controller->redirect ('/ ' . $this->app . '/admin/item/browse');
}

$form->data = new Item ($id);

echo $form->handle (function ($form) {
	
	$item = $form->data;
	$item->action = filter_input (INPUT_POST, 'action', FILTER_SANITIZE_NUMBER_INT);
	$item->ip = filter_input (INPUT_POST, 'ip', FILTER_SANITIZE_STRING);
	$item->created = filter_input (INPUT_POST, 'created', FILTER_SANITIZE_STRING);
	$item->id2_country = strtoupper (substr (filter_input (INPUT_POST, 'id2_country', FILTER_SANITIZE_STRING), 0, 2));
	$item->email = filter_input (INPUT_POST, 'email', FILTER_SANITIZE_STRING);
	$item->username = filter_input (INPUT_POST, 'username', FILTER_SANITIZE_STRING);
	$item->notes = filter_input (INPUT_POST, 'notes', FILTER_SANITIZE_STRING);
	$item->put ();

	if ($item->error) {
		$form->controller->add_notification (__ ('Unable to save item, error') . ': ' . $item->error);
		return false;
	}

	Versions::add ($item);

	$form->controller->add_notification ( __ ('Item saved'));
	$form->controller->redirect ('/' . $this->app . '/admin/item/browse');
	
});