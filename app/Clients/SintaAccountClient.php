<?php

namespace App\Clients;

/**
 * SintaAccountClient
 */
class SintaAccountClient extends SintaClientBase implements ClientInterface
{	
	public function fetchData()
	{
		$response = $this->client->get('countauthors', [
			'query' => [
				'kode_pt' => $this->institutionCode,
				'api_key' => $this->apiKey,
				'verified' => 1,
			]
		]);

		$data = json_decode($response->getBody(), true);

		return $data['count'];
	}
}