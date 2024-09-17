<?php

namespace App\Controllers;
use App\Models\Lead;
use App\Services\Config;
use App\Services\Providers\FirstTracker;

class LeadController
{

	private $leadModel;

	public function __construct()
	{
		$apiUrl = Config::get('API_URL');
		$token = Config::get('API_KEY');

		$this->leadModel = new Lead(new FirstTracker($apiUrl, $token));
	}
	public function showForm()
	{
		session_start();
		$errors = $_SESSION['errors'] ?? [];
		$formData = $_SESSION['formData'] ?? [];
		unset($_SESSION['errors'], $_SESSION['formData']);

		require_once '../app/Views/form.php';
	}

	public function submitLead()
	{
		$errors = $this->validateInput($_POST);

		if (empty($errors)) {
			$this->leadModel->addLead($_POST['firstName'], $_POST['lastName'], $_POST['phone'], $_POST['email']);
			unset($_SESSION['formData']);
			header('Location: /leads');
			exit;
		} else {
			session_start();
			$_SESSION['errors'] = $errors;
			$_SESSION['formData'] = $_POST;
			header('Location: /form');
			exit;
		}
	}

	public function showLeads()
	{
		$startDate = $_GET['start_date'] ?? null;
		$endDate = $_GET['end_date'] ?? null;
		$leads = $this->leadModel->getStatuses($startDate, $endDate);

		require_once '../app/Views/leads.php';
	}

	private function validateInput($data)
	{
		$errors = [];

		if (empty($data['firstName'])) {
			$errors[] = "Поле 'Имя' обязательно.";
		}
		if (empty($data['lastName'])) {
			$errors[] = "Поле 'Фамилия' обязательно.";
		}
		if (empty($data['phone']) || !preg_match('/^[0-9\-\(\)\/\+\s]*$/', $data['phone'])) {
			$errors[] = "Неверный формат телефона.";
		}
		if (empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
			$errors[] = "Неверный формат email.";
		}

		return $errors;
	}
}