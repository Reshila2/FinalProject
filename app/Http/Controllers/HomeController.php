<?php

namespace App\Http\Controllers;

use App\Filters\PostFilter;
use App\Filters\QueryFilter;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(PostFilter $request)
    {
        $posts = Post::filter($request)->paginate(3);
        $categories = Category::all();

        return view('mainPage.index',compact(['posts','categories']));
    }
}
