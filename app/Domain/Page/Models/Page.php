<?php

namespace Domain\Page\Models;

use Domain\Page\Models\Concerns\HasComputedAttributes;
use Domain\Page\Models\Concerns\HasMediaCollections;
use Domain\Page\Queries\PageQueryBuilder;
use Domain\Page\Repositories\PageRepository;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Translatable\HasTranslations;
use Support\Localization\Concerns\HasLocalizedAttribute;

class Page extends Model implements HasMedia
{
    use HasFactory;
    use HasMediaCollections;
    use HasTranslations;
    use HasLocalizedAttribute;
    use HasComputedAttributes;

    public array $translatable = [
        'meta_title',
        'meta_description',
    ];

    protected $guarded = [];

    protected $casts = [
        'is_indexing' => 'bool',
    ];

    protected static function boot()
    {
        parent::boot();

        static::saved(function (self $page) {
            app(PageRepository::class)->forget();
        });
    }

    public function newEloquentBuilder($query): PageQueryBuilder
    {
        return new PageQueryBuilder($query);
    }
}
