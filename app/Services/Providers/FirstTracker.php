<?php

namespace App\Services\Providers;

use App\Services\Config;

class FirstTracker implements TrackerInterface
{

	private $apiUrl;
	private $apiKey;

	public function __construct(string $apiUrl, string $apiKey)
	{
		$this->apiUrl = $apiUrl;
		$this->apiKey = $apiKey;
	}

	public function addLead($firstName, $lastName, $email, $phone)
	{
		$url = $this->apiUrl . '/addlead';
		$ip = $_SERVER['REMOTE_ADDR'];
		$landingUrl = $_SERVER['HTTP_HOST'];

		$data = [
			'box_id' => Config::get('BOX_ID'),
			'offer_id' => Config::get('OFFER_ID'),
			'countryCode' => Config::get('COUNTRY_CODE'),
			'language' => Config::get('LANGUAGE'),
			'password' => Config::get('PASSWORD'),
			'ip' => $ip,
			'landingUrl' => $landingUrl,
			'firstName' => $firstName,
			'lastName' => $lastName,
			'phone' => $phone,
			'email' => $email,
		];

		return $this->makeRequest($url, $data);
	}

	public function getLeadStatuses($startDate = null, $endDate = null)
	{
		$url = $this->apiUrl . '/getstatuses';
		$data = [];

		if ($startDate && $endDate) {
			$data['startDate'] = $startDate;
			$data['endDate'] = $endDate;
		}

		return $this->makeRequest($url, $data);
	}

	private function makeRequest($url, $data)
	{

		$headers = [
			'Content-Type: application/json',
			'token: ' . $this->apiKey
		];

		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

		$response = curl_exec($ch);

		if (curl_errno($ch)) {
			echo 'Ошибка cURL: ' . curl_error($ch);
		}

		curl_close($ch);

		return json_decode($response, true);
	}
}