<?php

namespace Domain\Page\Repositories;

use Domain\Page\Models\Page;
use Illuminate\Support\Collection;

class PageRepository
{
    private Collection $all;

    private string $cacheKey = 'pages:repository';

    public function __construct()
    {
        $this->all = $this->load();
    }

    public function all(): Collection
    {
        return $this->all;
    }

    public function home(): ?Page
    {
        return $this->resolve(__FUNCTION__);
    }

    private function load(): Collection
    {
        return cache()->rememberForever($this->cacheKey, $this->loader())
            ->mapWithKeys(fn (Page $page) => [$page->slug => $page]);
    }

    private function loader(): callable
    {
        return function () {
            return Page::query()
                ->with('media')
                ->get();
        };
    }

    private function resolve(string $slug): ?Page
    {
        return $this->all->get($slug);
    }

    public function forget(): void
    {
        cache()->forget($this->cacheKey);
    }
}
