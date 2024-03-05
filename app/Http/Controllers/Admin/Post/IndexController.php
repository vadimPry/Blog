<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;
use Illuminate\View\View;

class IndexController extends BaseController
{
    public function __invoke(): View
    {
        $posts = Post::all();

        return view('admin.post.index', compact('posts'));
    }
}
