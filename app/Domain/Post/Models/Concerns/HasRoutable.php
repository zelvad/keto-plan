<?php

namespace Domain\Post\Models\Concerns;

trait HasRoutable
{
    public function route(string $view = 'view'): string
    {
        return match ($view) {
            'view' => $this->getViewRoute(),
        };
    }

    private function getViewRoute(): string
    {
        return route('post.view', $this->id);
    }
}
