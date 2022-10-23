<?php

namespace Domain\Page\Queries;

use Illuminate\Database\Eloquent\Builder;

class PageQueryBuilder extends Builder
{
    public function slug(string $slug): self
    {
        return $this->where('slug', $slug);
    }
}
