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

        $achievement = tap(Achievement::where('name', 'article_scopus')->first())->update(['value' => $article]);

        return $achievement;
    }

    public function proceeding()
    {
        $proceeding = $this->repository->getProceeding();

        $achievement = tap(Achievement::where('name', 'proceeding_scopus')->first())->update(['value' => $proceeding]);

        return $achievement;
    }
}
