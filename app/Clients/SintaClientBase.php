<?php

namespace App\Clients;

use GuzzleHttp\Client;

/**
 * SintaClient
 */
class SintaClientBase
{
	public $client;
	public $apiKey = 'a39e735fd5049ba1f7ff0b4e05c9f207';
	public $institutionCode = '001001';

	function __construct()
	{
		$this->client = new Client([
			'base_uri' => 'http://sinta2.ristekdikti.go.id/api/'
		]);
	}
}