<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{
    Factories\HasFactory,
    Relations\BelongsTo,
    Model,
    Prunable,
    SoftDeletes
};

class ArticleCategory extends Model
{
    use HasFactory, SoftDeletes, Prunable;

    protected $fillable = [
        'name',
        'updated_user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_user_id');
    }

    public function prunable()
    {
        return static::where('created_at', '<=', now()->subWeek());
    }
}
