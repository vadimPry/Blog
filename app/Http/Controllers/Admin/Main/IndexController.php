<?php

namespace App\Http\Controllers\Admin\Main;

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
        $data = [];

        $data['User'] = User::all()->count();
        $data['Post'] = Post::all()->count();
        $data['Category'] = Category::all()->count();
        $data['Tag'] = Tag::all()->count();

        return view('admin.main.index', compact('data'));
    }
}
