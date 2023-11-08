<?php

namespace App\Models;

use App\Tenancy\BelongsToTenant;
use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasUuids;
    use HasFactory;
    use Searchable;
    use SoftDeletes;
    use BelongsToTenant;

    protected $fillable = [
        'type',
        'name',
        'email',
        'phone',
        'country',
        'api_keys',
        'slug',
        'company_id',
    ];

    protected $searchableFields = ['*'];

    protected $hidden = ['slug'];

    protected $casts = [
        'api_keys' => 'array',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function companies()
    {
        return $this->hasMany(Company::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function companySettings()
    {
        return $this->hasMany(CompanySetting::class);
    }

    public function users()
    {
        return $this->morphedByMany(User::class, 'companyable');
    }
}
