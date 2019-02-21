<?php

namespace App\Clients;

/**
 * TotalCitationClient
 */
class TotalCitationClient extends SintaClientBase implements ClientInterface
{
	public function fetchData()
	{
		$response = $this->client->get('countcitations', [
			'query' => [
				'kode_pt' => $this->institutionCode,
				'api_key' => $this->apiKey,
			]
		]);

		$data = json_decode($response->getBody(), true);

		return (int)$data['data']['scopus_citation'];
	}
}