<?php

namespace App\Http\Controllers\Api;

use App\Achievement;
use App\Http\Controllers\Controller;
use App\Repositories\ScopusRepository;
use Illuminate\Http\Request;

class ScopusController extends Controller
{
    function __construct(ScopusRepository $repository)
    {
        $this->repository = $repository;
    }

    public function article()
    {
        $article = $this->repository->getArticle();

        $achievement = tap(Achievement::where('name', 'publication_scopus')->first())->update(['value' => $article]);

        return $achievement;
    }
}
