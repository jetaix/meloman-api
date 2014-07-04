<?php
header("Access-Control-Allow-Origin: http://127.0.0.1:9000");
?>
<?php

$f3=require('framework/base.php');

$f3->set('DEBUG',1);
if ((float)PCRE_VERSION<7.9)
	trigger_error('PCRE version is out of date');

$f3->config('api/configs/config.ini');
$f3->config('api/configs/routes.ini');

$f3->route('GET /',
	function($f3) {
		echo 'Bienvenue sur l\'api meloman';
	}
);


$f3->run();
