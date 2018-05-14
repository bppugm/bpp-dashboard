<?php

namespace App\Http\Controllers\Api;

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
        return $this->repository->getArticle();
    }

    public function proceeding()
    {
        return $this->repository->getProceeding();
    }
}
