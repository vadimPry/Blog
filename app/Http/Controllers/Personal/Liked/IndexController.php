<?php

namespace App\Http\Controllers\Personal\Liked;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function __invoke() :View
    {
        $posts = auth()->user()->likedPosts;
        return view('personal.liked.index', compact('posts'));
    }
}
