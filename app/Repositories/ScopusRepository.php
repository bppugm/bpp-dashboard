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

    public function setRepoHeader()
    {
        $this->headers = [
            'X-ELS-APIKey' => env('SCOPUS_API_KEY')
        ];
    }

    public function getArticle()
    {
        $this->query = [
            'query' => 'pubdatetxt(2018)AF-ID(60069380)DOCTYPE(ar OR ip)',
            'count' => 1,
        ];

        $this->getResponse('GET', 'content/search/scopus');

        return $this->data['search-results']['opensearch:totalResults'];
    }

    public function getProceeding()
    {
        $this->query = [
            'query' => 'pubdatetxt(2018)AF-ID(60069380)DOCTYPE(cp)',
            'count' => 1,
        ];

        $this->getResponse('GET', 'content/search/scopus');

        return $this->data['search-results']['opensearch:totalResults'];
    }
}
