<?php

namespace App\Clients;

/**
 * PublicationMicrosoftAcademic
 */
class PublicationMaClient extends MicrosoftAcademicBase
{
	public function fetchData()
	{
		$allPublication = $this->getAllPublications();
		// $indonesianPublication = $this->getIndonesianPublication();

		return $allPublication;
	}

	protected function getAllPublications()
	{
		$response = $this->client->post('calchistogram', [
			'form_params' => [
				'expr' => "AND(Composite(AA.AfN=='gadjah mada university'),Y=2019,L='en')"
			]
		]);

		$results = json_decode($response->getBody(), true);

		return $results['num_entities'];
	}

	protected function getIndonesianPublication()
	{
		$response = $this->client->post('calchistogram', [
			'form_params' => [
				'expr' => "AND(Composite(AA.AfN=='gadjah mada university'),Y=2019,OR(L='id',L='en@@@id'))"
			]
		]);

		$results = json_decode($response->getBody(), true);

		return $results['num_entities'];
	}
}