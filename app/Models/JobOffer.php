<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobOffer extends Model
{
    protected $fillable = ["title", "description", "location", "category_id"];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
