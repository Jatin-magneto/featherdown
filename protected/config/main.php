<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Feather Down',
	'defaultController' => 'site/login',
    'theme'=>'featherdown',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
                'application.modules.admin.models.*',
                'application.modules.admin.components.*',
                'application.modules.product.models.*',
                'application.modules.product.components.*',
                'application.modules.account.models.*',
                'application.modules.account.components.*',
                'application.modules.location.models.*',
                'application.modules.location.components.*',
                'application.modules.supplier.models.*',
                'application.modules.supplier.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'admin',
                'product',
                'supplier',
                'account',
                'location',
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'test',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','*'),
		),
		
	),

	// application components
	'components'=>array(

		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),

		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
            'showScriptName'=>false,
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		

		// database settings are configured in database.php
		//'db'=>require(dirname(__FILE__).'/database.php'),
		 'db'=>array(
                    'connectionString' => 'mysql:host=192.168.2.13;dbname=featherdown_v1',
                    'emulatePrepare' => true,
                    'username' => 'root',
                    'password' => '',
                    'charset' => 'utf8',
                   ), 
                   /*
                   'db'=>array(
				'connectionString' => 'mysql:host=localhost;dbname=magnetog_featherdown_v1',
				'emulatePrepare' => true,
				'username' => 'magnetog_feather',
				'password' => 'A_deepv;2CM8',
				'charset' => 'utf8',
			   ), 
                    */
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),

		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',//CWebLogRoute
					//'levels'=>'error, warning,trace,log',
                    'categories' => 'system.db.CDbCommand',
                    //'logFile' => 'db.log',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),

	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);
