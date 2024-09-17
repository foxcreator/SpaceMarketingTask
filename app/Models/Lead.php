<?php

namespace App\Models;

use App\Services\Config;
use App\Services\Providers\TrackerInterface;

class Lead
{
	private $tracker;

	public function __construct(TrackerInterface $tracker)
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