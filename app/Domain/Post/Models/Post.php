<?php

namespace Domain\Post\Models;

use Domain\Post\Models\Concerns\HasContent;
use Domain\Post\Models\Concerns\HasRoutable;
use Domain\Post\Queries\PostQueryBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasRoutable;
    use HasContent;

    protected $guarded = [];

    protected $casts = [
        'content' => 'array',
    ];

    public static function boot(): void
    {
        parent::boot();

        static::saving(function (Post $post): void {
            // TODO: fix EditorJS plugin save
            $post->content = json_decode($post->content);
        });
    }

    public function newEloquentBuilder($query): PostQueryBuilder
    {
        return new PostQueryBuilder($query);
    }
}
