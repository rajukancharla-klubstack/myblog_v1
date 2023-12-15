<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Services\ApiService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $apiService;

    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function index()
    {
        $posts = Post::with('user')->latest()->get();
        return view('dashboard.index', compact('posts'));
    }
    public function fetchDataFromApi()
    {
        $data = $this->apiService->fetchData();



        return response()->json($data);
    }
}
