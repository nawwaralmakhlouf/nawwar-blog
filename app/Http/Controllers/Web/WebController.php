<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Repositories\WebRepository;
use function view;

class WebController extends Controller
{

    private $webRepository;

    public function __construct(WebRepository $webRepository)
    {
        $this->webRepository = $webRepository;
    }

    public function index()
    {
        return view('home');
    }

    public function statistics()
    {
        $query_a = $this->webRepository->query_e();
        $query_b = $this->webRepository->query_b();
        $query_c = $this->webRepository->query_c();
        $query_d = $this->webRepository->query_d();
        $query_e = $this->webRepository->query_e();
        $query_f = $this->webRepository->query_f();
        $query_g = $this->webRepository->query_g();
        return view('statistics', compact('query_a', 'query_b', 'query_c', 'query_d', 'query_e', 'query_f', 'query_g'));
    }
}
