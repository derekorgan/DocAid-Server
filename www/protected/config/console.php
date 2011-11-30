<?php


// database settings for different enviroments

	$envhost = '127.0.0.1';
	$envdb = 'docaid';
	$envuser = 'root';
	$envpass = 'root';


// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'DocAid',
	// application components
	'components'=>array(
		/*'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),*/

		'db'=>array(
			'connectionString' => "mysql:host=$envhost;dbname=$envdb",
			'emulatePrepare' => true,
			'username' => $envuser,
			'password' => $envpass,
			'charset' => 'utf8',
		),

	),
);
