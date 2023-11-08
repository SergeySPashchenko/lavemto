<?php

namespace App\Models;

use App\Tenancy\BelongsToTenant;
use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CompanySetting extends Model
{
    use HasFactory;
    use Searchable;
    use SoftDeletes;
    use BelongsToTenant;

    protected $fillable = [
        'company_id',
        'logo',
        'favicon',
        'main_image',
        'description',
        'state',
        'city',
        'address',
        'zip',
        'additional_info',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'company_settings';

    protected $casts = [
        'additional_info' => 'array',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
