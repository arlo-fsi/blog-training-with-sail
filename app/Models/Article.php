<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{
    Factories\HasFactory,
    Relations\BelongsTo,
    Model,
    Prunable,
    SoftDeletes
};

class Article extends Model
{
    use HasFactory, SoftDeletes, Prunable;

    protected $fillable = [
        'article_category_id',
        'updated_user_id',
        'title',
        'slug',
        'contents',
        'image_path',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(ArticleCategory::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_user_id');
    }

    public function prunable()
    {
        return static::where('created_at', '<=', now()->subWeek());
    }
}
