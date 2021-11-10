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
        'updated_at',
        'deleted_at'
    ];

    protected $with = [
        'tags', 'author'
    ];

    public function scopePublished($query)
    {
        $query->where('state', true);
    }

    public function scopeDraft($query)
    {
        $query->where('state', false);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when(isset($filters['search']), function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('content', 'like', '%' . $search . '%');
            });
        });

        $query->when(isset($filters['tag']), function ($query, $tag) {
            $query->whereRelation('tags', 'name', '=', $tag);
        });

        $query->when(isset($filters['author']), function ($query, $author) {
            $query->whereRelation('author', 'name', '=', $author);
        });
    }

    public function scopePopular($query)
    {
        return $query->orderBy('views','desc');
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
}
