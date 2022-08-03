<?php

namespace App\Models;

use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\{
    Factories\HasFactory,
    Relations\BelongsTo,
    Model,
    Prunable,
    SoftDeletes
};

class Blog extends Model
{
    use HasFactory, SoftDeletes, Prunable;

    // Better to have slug column for friendly url
    protected $fillable = [
        'blog_category_id',
        'title',
        'contents',
        'image_path',
        'updated_by',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(BlogCategory::class, 'blog_category_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function getShortDescriptionAttribute()
    {
        $contents = $this->attributes['contents'];
        $contents = strip_tags($contents);
        $contents = trim($contents, ' ');
        $contents = Str::limit($contents, 320);

        return $contents;
    }

    public function prunable()
    {
        return static::where('created_at', '<=', now()->subWeek());
    }
}
