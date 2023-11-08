<?php

namespace App\Models;

use App\Tenancy\BelongsToTenant;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Scopes\Searchable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasUuids;
    use Notifiable;
    use HasFactory;
    use Searchable;
    use SoftDeletes;
    use HasApiTokens;
    use BelongsToTenant;

    protected $fillable = [
        'name',
        'last_name',
        'email',
        'phone',
        'password',
        'country',
        'slug',
        'api_keys',
        'company_id',
    ];

    protected $searchableFields = ['*'];

    protected $hidden = ['password', 'slug', 'remember_token'];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'api_keys' => 'array',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function companies()
    {
        return $this->morphToMany(Company::class, 'companyable');
    }

    public function isSuperAdmin(): bool
    {
        return in_array($this->email, config('auth.super_admins'));
    }
}
