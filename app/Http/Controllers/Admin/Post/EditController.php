<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\View\View;

class EditController extends BaseController
{
    public function __invoke(Post $post): View
    {
        $tags = Tag::all();

        $categories = Category::all();

        return view('admin.post.edit', compact('post', 'categories', 'tags'));
    }
}
