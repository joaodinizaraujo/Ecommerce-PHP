<?php

use Slim\Slim;

require_once("vendor/autoload.php");

$app = new Slim();

$app->config('debug', true);

$app->get('/', function() {
	echo "OK";
});

$app->run();

 ?>