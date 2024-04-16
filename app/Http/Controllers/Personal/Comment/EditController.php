<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\View\View;

class EditController extends Controller
{
    public function __invoke(Comment $comment): View
    {
        return view('personal.comment.edit', compact('comment'));
    }
}
