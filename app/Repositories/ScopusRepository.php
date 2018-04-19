<?php

namespace App\Repositories;

use App\Services\GuzzleService;

/**
* Scopus Repository
*/
class ScopusRepository extends GuzzleService
{
    public $uris = [
        'base' => 'https://api.elsevier.com/',
    ];

    public $headers = [
        'X-ELS-APIKey' => 'ee76c131d9bf443e5afffa9be30dd723'
    ];

    public function search()
    {
        $this->query = [
            'query' => 'pubdatetxt(2018)AF-ID(60069380)DOCTYPE(ar OR ip)',
            'count' => 1,
        ];

        $this->getResponse('GET', 'content/search/scopus');

        return $this->data['search-results']['opensearch:totalResults'];
    }
}
