<?php

namespace App\Controllers;
use App\Models\Lead;

class LeadController
{
	public function showForm()
	{
		require_once '../app/views/form.php';
	}

	public function submitLead()
	{
		$lead = new Lead();
		$lead->addLead($_POST['firstName'], $_POST['lastName'], $_POST['phone'], $_POST['email']);

		echo "Лид успешно отправлен";
	}

	public function showLeads()
	{
		$lead = new Lead();
		$startDate = isset($_GET['start_date']) ? $_GET['start_date'] : null;
		$endDate = isset($_GET['end_date']) ? $_GET['end_date'] : null;
		$leads = $lead->getStatuses($startDate, $endDate);

		require_once '../app/views/leads.php';
	}
}