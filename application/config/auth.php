<?php defined('SYSPATH') OR die('No direct access allowed.');

return array(

	'driver'       => 'orm',
	'hash_method'  => 'sha256',
	'hash_key'     => 'bum',
	'lifetime'     => 1209600,
	'session_type' => Session::$default,
	'session_key'  => 'auth_user',

	// Username/password combinations for the Auth File driver
	'users' => array(
//		 'admin' => 'b39ca6429cbd3fdcd3e6b37fb15d27b47656341706ec417a192d730b6a63e4a1', //123
	),

);
