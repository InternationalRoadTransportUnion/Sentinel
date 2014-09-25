<?php

// keep unauthorized users out
$this->require_admin ();

// set the layout
$page->layout = 'admin';
$page->add_style ('/apps/' . $this->app . '/css/admin.css');

// get the version and check if the app installed
$version = Appconf::get ($this->app, 'Admin', 'version');
$current = $this->installed ($this->app, $version);

if ($current === true) {
	// app is already installed and up-to-date, stop here
	$page->title = __ ('Already up-to-date');
	printf ('<p><a href="/%s/admin">%s</a>', $this->app, __ ('Continue'));
	return;
}

$page->title = sprintf (
	'%s: %s',
	__ ('Upgrading App'),
	Appconf::get ($this->app, 'Admin', 'name')
);

// grab the database driver and begin the transaction
$conn = conf ('Database', 'master');
$driver = $conn['driver'];
DB::beginTransaction ();

// parse the database schema into individual queries
$file = 'apps/' . $this->app . '/conf/upgrade_' . Appconf::get ($this->app, 'Admin', 'version') . '_' . $driver . '.sql';
if (file_exists ($file)) {
	$sql = sql_split (file_get_contents ($file));

	// execute each query in turn
	foreach ($sql as $query) {
		if (! DB::execute ($query)) {
			// show error and rollback on failures
			printf (
				'<p class="visible-notice">%s: %s</p><p>%s</p>',
				__ ('Error'),
				DB::error (),
				__ ('Install failed.')
			);
			DB::rollback ();
			return;
		}
	}
}

// commit transaction and mark the app installed
DB::commit ();
$this->mark_installed ($this->app, $version);

printf ('<p><a href="/%s/admin">%s</a></p>', $this->app, __ ('Done.'));