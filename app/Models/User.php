<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'profile_photo_url',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id',
        'username',
        'email',
        'email_verified_at',
        'is_admin',
        'password',
        'remember_token',
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('username', 'like', '%' . $search . '%');
            });
        });
    }

    /**
     * Mark the given user's email as verified.
     *
     * @return bool
     */
    public function markEmailAsVerified()
    {
        $this->roles()->attach(4);

        return $this->forceFill([
            'email_verified_at' => $this->freshTimestamp()
        ])->save();
    }


    public function isAdmin(): bool
    {
        return $this->roles()->where('slug', '=', 'administrator')->count() > 0;
    }

    public function isAuthor(): bool
    {
        return $this->roles()->where('slug', '=', 'author')->count() > 0;
    }

    public function isCustomerService(): bool
    {
        return $this->roles()->where('slug', '=', 'customer-service')->count() > 0;
    }

    public function isNormalUser(): bool
    {
        return $this->roles()->where('slug', '=', 'user')->count() > 0;
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function likes()
    {
        return $this->belongsToMany(Article::class, 'likes');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
