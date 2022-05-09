<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    use HasFactory;

    protected $fillable =[

    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at'
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function user(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
