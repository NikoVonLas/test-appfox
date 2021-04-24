<?php
	return [
		'authHost'			=> env('APP_URL', 'http://localhost'),
		'authEndpoint'		=> env('LARAVEL_ECHO_SERVER_AUTH_ENDPOINT', '/broadcasting/auth'),
		'clients'			=> [
			[
				'appId' => env('LARAVEL_ECHO_SERVER_CLIENT_ID'),
				'key'	=> env('LARAVEL_ECHO_SERVER_CLIENT_KEY'),
			]
		],
		'database'			=> env('LARAVEL_ECHO_SERVER_DB', 'redis'),
		'databaseConfig'	=> [
			'redis'  => [
				'host' 	   => env('LARAVEL_ECHO_SERVER_REDIS_HOST', '127.0.0.1'),
				'port'     => env('LARAVEL_ECHO_SERVER_REDIS_PORT', '6379'),
				'password' => env('LARAVEL_ECHO_SERVER_REDIS_PASSWORD', null),
			],
			'sqlite' => [
				'databasePath' => env('LARAVEL_ECHO_SERVER_SQLITE_PATH', '/database/laravel-echo-server.sqlite')
			]
		],
		'socketio' 			=> [],
		'secureOptions' 	=> 67108864,
		'subscribers'		=> [
			'http'  => true,
			'redis' => true
		],
		'apiOriginAllow'	=> [
			'allowCors'    => false,
			'allowOrigin'  => '',
			'allowMethods' => '',
			'allowHeaders' => ''
		]
	];
