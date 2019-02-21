<?php

namespace App\Clients;

use GuzzleHttp\Client;

/**
 * ScopusClient
 */
class ScopusClientBase
{
	public $client;

	function __construct()
	{
		$this->client = new Client([
			'base_uri' => 'https://api.elsevier.com/',
			'headers' => [
				'X-ELS-APIKey' => env('SCOPUS_API_KEY')
			]
		]);		
	}
}