<?php


// database settings for different enviroments

        $envhost = 'localhost';
        $envdb = '_docaid';
        $envuser = 'root';
        $envpass = 'wh1stl3r';


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
