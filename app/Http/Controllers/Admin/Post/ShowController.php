<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;

class ShowController extends Controller
{
    public function __invoke(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }
}
