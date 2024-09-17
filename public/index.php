<?php

require_once '../vendor/autoload.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($uri === '/' || $uri === '/form') {
	$controller = new \App\Controllers\LeadController();
	$controller->showForm();
} elseif ($uri === '/submit_lead' && $_SERVER['REQUEST_METHOD'] === 'POST') {
	$controller = new \App\Controllers\LeadController();
	$controller->submitLead();
} elseif ($uri === '/leads') {
	$controller = new \App\Controllers\LeadController();
	$controller->showLeads();
} else {
	echo "404 Not Found";
}