<?php

namespace App\Http\Controllers\Blog\Category\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;

class IndexController extends Controller
{
    public function __invoke(Category $category)
    {
        $categoryPosts = $category->posts;

        return view('blog.category.post.index', compact('categoryPosts', 'category'));
    }
}

