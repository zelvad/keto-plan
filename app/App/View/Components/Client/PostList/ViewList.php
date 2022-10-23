<?php

namespace App\View\Components\Client\PostList;

use Domain\Post\Models\Post;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;
use Illuminate\View\View;

class ViewList extends Component
{
    public Collection $posts;

    public function __construct()
    {
        $this->getPosts();
    }

    public function render(): View
    {
        return view('components.client.post-list.view-list');
    }

    private function getPosts()
    {
        $this->posts = Post::query()
            ->isView()
            ->get();
    }
}
