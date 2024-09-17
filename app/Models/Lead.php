<?php

namespace App\Models;

class Lead
{
	private $apiUrl = 'https://api.example.com';
	private $token = 'ba67df6a-a17c-476f-8e95-bcdb75ed3958';

	public function addLead($firstName, $lastName, $phone, $email)
	{
		$url = $this->apiUrl . '/addlead';
		$ip = $_SERVER['REMOTE_ADDR'];
		$landingUrl = $_SERVER['HTTP_HOST'];

		$data = [
			'box_id' => 28,
			'offer_id' => 5,
			'countryCode' => 'GB',
			'language' => 'en',
			'password' => 'qwerty12',
			'ip' => $ip,
			'landingUrl' => $landingUrl,
			'firstName' => $firstName,
			'lastName' => $lastName,
			'phone' => $phone,
			'email' => $email,
		];

		return $this->makeRequest($url, $data);
	}

	public function getStatuses($startDate = null, $endDate = null)
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
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, [
			'Content-Type: application/json',
			'Authorization: Bearer ' . $this->token
		]);
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