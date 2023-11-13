<?php

namespace App\Http\Controllers\Web\News;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return view('news.blog');
    }

    public function show(Request $request, $post)
    {
        return view('news.single');
    }
}
