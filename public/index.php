<?php

use App\Controllers\LeadController;
use App\Services\Config;

require_once '../vendor/autoload.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
Config::load(__DIR__ . '/../.env');

if ($uri === '/' || $uri === '/form') {
	$controller = new LeadController();
	$controller->showForm();
} elseif ($uri === '/submit_lead' && $_SERVER['REQUEST_METHOD'] === 'POST') {
	$controller = new LeadController();
	$controller->submitLead();
} elseif ($uri === '/leads') {
	$controller = new LeadController();
	$controller->showLeads();
} else {
	echo "404 Not Found";
}