<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Permission extends \Spatie\Permission\Models\Permission
{
 use HasUuids;
    public function team(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
