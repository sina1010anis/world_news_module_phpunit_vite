<?php

namespace Modules\Front\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Front\Entities\Post;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Post $post)
    {
        return view('front::index', ['posts' => $post->latest('id')->paginate(10)]);
    }

    public function sortNews($sort, Post $post)
    {
        return view('front::index', ['posts' => $post->sortPosts($sort)->data]);
    }
}
