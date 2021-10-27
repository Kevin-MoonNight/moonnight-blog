<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug'
    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at'
    ];

    public function scopeFilter($query, array $filter)
    {
        $query->when(isset($filter['search']), function ($query, $search) {
            $query->where('slug', 'like', '%' . $search . '%');
        });
    }

    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }
}
