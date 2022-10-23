<?php

namespace Scalemeup\UiTranslations\Domain\Translation\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class NovaUiTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['key', 'translations', 'module'];

    protected $casts = [
        'translations' => 'array',
    ];

    public static function boot(): void
    {
        parent::boot();

        static::saving(fn () => self::flush());
        static::deleting(fn () => self::flush());
    }

    public static function flush(): void
    {
        cache()->forget('translations');
    }

    public static function cached(): Collection
    {
        return cache()->rememberForever('translations', fn () => self::all());
    }
}
