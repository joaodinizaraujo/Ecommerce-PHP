<?php

use Slim\Slim;
use joaodinizaraujo\Page;

require_once("vendor/autoload.php");
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
$_SERVER["DOCUMENT_ROOT"] = $_SERVER["DOCUMENT_ROOT"]."/Ecommerce-PHP";

$app = new Slim();

$app->config('debug', true);

$app->get('/', function() {
	$page = new Page();
    $page->setTpl("index");
});

$app->run();

 ?>