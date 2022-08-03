<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{
    Factories\HasFactory,
    Relations\BelongsTo,
    Model,
    Prunable,
    SoftDeletes
};

class BlogCategory extends Model
{
    use HasFactory, SoftDeletes, Prunable;

    protected $fillable = [
        'name',
        'updated_by',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function prunable()
    {
        return static::where('created_at', '<=', now()->subWeek());
    }
}
