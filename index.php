<?php

require_once("vendor/autoload.php");

use joaodinizaraujo\PageAdmin;
use Slim\Slim;
use joaodinizaraujo\Page;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$app = new Slim();
$app->config('debug', true);

$app->get('/', function() {
	$page = new Page();
    $page->setTpl("index");
});

$app->get('/admin', function() {
    $page = new PageAdmin();
    $page->setTpl("index");
});

$app->run();

?>