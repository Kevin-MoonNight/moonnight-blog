<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasAvatar;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail, FilamentUser, HasAvatar
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'profile_photo_url',
        'email_verified_at',
    ];

    protected $hidden = [
        'id',
        'password',
        'remember_token',
        'created_at',
        'updated_at'
    ];

    public function canAccessFilament(): bool
    {
        return $this->hasVerifiedEmail();
    }

    public function getFilamentAvatarUrl(): ?string
    {
        return $this->profile_photo_url;
    }

    public function isAdmin(): bool
    {
        return $this->roles->where('slug', '=', 'administrator')->count() > 0;
    }

    public function isAuthor(): bool
    {
        return $this->roles->where('slug', '=', 'author')->count() > 0;
    }

    public function isCustomerService(): bool
    {
        return $this->roles->where('slug', '=', 'customer-service')->count() > 0;
    }

    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    public function likes(): BelongsToMany
    {
        return $this->belongsToMany(Article::class, 'likes');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
