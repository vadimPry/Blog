<?php

namespace App\Http\Controllers\Blog\Post;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Carbon\Carbon;


class ShowController extends Controller
{
    public function __invoke(Post $post)
    {
        $date = Carbon::parse($post->created_at);
        $relatedPosts = Post::where('category_id', $post->category_id)->where('id', '!=', $post->id)->get()->take(3);
        $comments = Comment::all();

        return view('blog.post.show', compact('post', 'date', 'comments', 'relatedPosts'));
    }
}

