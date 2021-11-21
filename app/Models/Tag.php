<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'slug'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function scopeFilter($query, array $filter)
    {
        $query->when($filter['search'] ?? false, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('slug', 'like', '%' . $search . '%');
            });

        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }
}
