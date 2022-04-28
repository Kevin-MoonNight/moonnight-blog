<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'views',
        'thumbnail',
        'state',
        'user_id'
    ];

    protected $hidden = [
        'id',
        'state',
        'user_id',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('content', 'like', '%' . $search . '%');
            });
        });

        $query->when($filters['tag'] ?? false, function ($query, $tag) {
            $query->whereRelation('tags', 'slug', '=', $tag);
        });

        $query->when($filters['author'] ?? false, function ($query, $author) {
            $query->whereRelation('author', 'name', '=', $author);
        });
    }

    public function scopeDraft($query)
    {
        $query->where('state', false);
    }

    public function scopePublished($query)
    {
        $query->where('state', true);
    }

    public function scopePopular($query)
    {
        $query->orderBy('views', 'desc');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function likes()
    {
        return $this->belongsToMany(User::class, 'likes');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
