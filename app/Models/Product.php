<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'excerpt',
        'thumbnail',
    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at'
    ];

    public function scopeFilter($query, array $filter)
    {
        $query->when($filter['search'] ?? false, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('excerpt', 'like', '%' . $search . '%');
            });
        });
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
