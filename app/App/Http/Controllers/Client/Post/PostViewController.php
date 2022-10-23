<?php

namespace App\Http\Controllers\Client\Post;

use App\Http\Controllers\Controller;
use Domain\Post\Models\Post;
use Illuminate\Http\Request;

class PostViewController extends Controller
{
    public function __invoke(Request $request)
    {
        return view('client.post.view', [
            'post' => $this->findPost($request->route('post')),
        ]);
    }

    private function findPost(int $postId): Post
    {
        /** @var Post $post */
        $post = Post::query()
            ->isView()
            ->findOrFail($postId);

        return $post;
    }
}
