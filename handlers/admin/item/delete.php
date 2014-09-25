<?php

$this->require_admin ();

if (! ($id = filter_input (INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT))) {
	$this->add_notification (__ ('Unable to delete item') . ': ' . __ ('Empty ID'));
	$this->redirect ('/' . $this->app . '/admin/item/browse');
}

$ip = new Item;
$ip->remove ($id);

if ($sentinel->error) {
	$this->add_notification (__ ('Unable to delete item'));
	$this->redirect ('/' . $this->app . '/admin/item/browse');
}

$this->add_notification ( __ ('Item deleted'));
$this->redirect ('/' . $this->app . '/admin/item/browse');