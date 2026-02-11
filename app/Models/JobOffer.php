<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class JobOffer extends Model
{
    protected $fillable = ['title', 'description', 'location', 'category_id'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function getSafeDescriptionAttribute(): string
    {
        $description = $this->description ?? '';

        $withoutScriptsAndStyles = preg_replace(
            '#<(script|style)\b[^>]*>.*?</\1>#is',
            '',
            $description,
        ) ?? '';

        return Str::of(strip_tags($withoutScriptsAndStyles))
            ->squish()
            ->toString();
    }
}
