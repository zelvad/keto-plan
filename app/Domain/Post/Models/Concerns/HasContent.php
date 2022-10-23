<?php

namespace Domain\Post\Models\Concerns;

trait HasContent
{
    public function getBlocksAttribute(): array
    {
        // TODO: не использовать casts для content из-за проблем с редактором
        return $this->content['blocks'] ?? [];
    }
}
