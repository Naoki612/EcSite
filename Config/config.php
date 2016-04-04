<?php

	$db_host = "localhost";
	$db_name = "ec-site";
	$db_type = "mysql";

	define('DNS', "$db_type:host=$db_host;dbname=$db_name;charset=utf8");
	define('DB_USER','ecSite');
	define('DB_PASS','test');

	error_reporting(E_ALL & ~E_NOTICE);
	define('SITE_URL', 'http://localhost/ecSite/Page');

	require_once(__DIR__ . '/../lib/functions.php');
	require_once(__DIR__ . '/autoload.php');

	$loader = new ClassLoader();
	$loader->registerDir('/lib');
	$loader->registerDir('/lib/Admin');
	$loader->registerDir('/lib/Controller');
	$loader->registerDir('/lib/Exception');
	$loader->registerDir('/lib/Model');
	$loader->register();

	session_start();
