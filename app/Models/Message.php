<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Message extends Model
{
    use HasFactory, HasApiTokens;

    protected $fillable = [
        'name',
        'email',
        'remark',
        'caseType'
    ];

    protected $hidden = [
        'updated_at',
    ];

    public function scopeFilter($query, array $filter)
    {
        $query->when($filter['search'] ?? false, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('remark', 'like', '%' . $search . '%');
            });
        });
        //todo 新增case type過濾器
    }
}
