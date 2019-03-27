<?php

namespace App\Clients;

/**
 * PublicationMicrosoftAcademic
 */
class PublicationMaClient extends MicrosoftAcademicBase
{
	public function fetchData()
	{
		$response = $this->client->post('calchistogram', [
			'form_params' => [
				'expr' => "AND(Composite(AA.AfN=='gadjah mada university'),Y=2019)"
			]
		]);

		$results = json_decode($response->getBody(), true);

		return $results['num_entities'];
	}
}