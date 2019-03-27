<?php

namespace App\Clients;

use GuzzleHttp\Client;

/**
 * MicrosoftAcademicBase
 */
abstract class MicrosoftAcademicBase implements ClientInterface
{
	protected $client;
	protected $headers = [];

	function __construct()
	{
		$this->headers['Ocp-Apim-Subscription-Key'] = '910f7d70387c416a8a3fedfe5141251d';

		$this->client = new Client([
			'base_uri' => 'https://api.labs.cognitive.microsoft.com/academic/v1.0/',
			'headers' => $this->headers,
		]);
	}
}