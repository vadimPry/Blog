<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function __invoke(): View
    {
        $tags = Tag::all();

        return view('admin.tag.index', compact('tags'));
    }
}
