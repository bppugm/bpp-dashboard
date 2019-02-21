<?php

namespace App\Clients;

/**
 * PublicationScopus
 */
class PublicationScopusClient extends ScopusClientBase implements ClientInterface
{
	public function fetchData()
	{
		$response = $this->client->get('content/search/scopus', [
			'query' => [
				'query' => 'pubdatetxt(2018)AF-ID(60069380)',
            	'count' => 1,
			]
		]);

		$results = json_decode($response->getBody(), true);

		return (int)$results['search-results']['opensearch:totalResults'];
	}
}