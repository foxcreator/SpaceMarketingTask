<?php

namespace App\Services\Providers;

interface TrackerInterface
{
	 public function addLead($firstName, $lastName, $email, $phone);

	 public function getLeadStatuses($startDate = null, $endDate = null);
}