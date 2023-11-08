<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Role extends \Spatie\Permission\Models\Role
{
    use HasUuids;
    public function team(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
