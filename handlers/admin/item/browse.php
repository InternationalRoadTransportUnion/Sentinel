<?php

$this->require_admin ();

$page->layout = 'admin';
$page->add_style ('/apps/' . $this->app . '/css/admin.css');
$page->title = Appconf::get ($this->app, 'Admin', 'name') . ' - ' .  __ ('Browse blocked items');

$limit = 20;
$num = isset ($this->params[0]) ? $this->params[0] : 1;
$offset = ($num - 1) * $limit;

$items = Item::query ()->order ('created', 'desc')->fetch ($limit, $offset);
$total = Item::query ()->count ();

echo $tpl->render (
	$this->app . '/admin/item/browse',
	array (
		'limit' => $limit,
		'total' => $total,
		'items' => $items,
		'count' => count ($items),
		'url' => '/' . $this->app . '/admin/item/%d'
	)
);