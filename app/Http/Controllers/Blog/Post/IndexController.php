<?php

namespace App\Http\Controllers\Blog\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;


class IndexController extends Controller
{
    public function __invoke()
    {


        $posts = Post::paginate(6);
        $postsRandom = Post::get()->random(6);
        $postsRandom3 = Post::get()->random(3);
        $likedPosts = Post::withCount('likedUsers')->orderBy('liked_users_count', 'desc')->get()->take(4);
        return view('blog.post.index', compact('posts', 'postsRandom', 'likedPosts', 'postsRandom3'));
    }
}

