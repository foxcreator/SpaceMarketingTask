<?php

namespace App\Models;

use App\Services\Providers\FirstTracker;

class Lead
{
	private $tracker;

	public function __construct(FirstTracker $tracker)
	{
		$this->tracker = $tracker;
	}

	public function addLead($firstName, $lastName, $phone, $email)
	{
		return $this->tracker->addLead($firstName, $lastName, $phone, $email);
	}

	public function getStatuses($startDate = null, $endDate = null)
	{
		return $this->tracker->getLeadStatuses($startDate, $endDate);
	}
}