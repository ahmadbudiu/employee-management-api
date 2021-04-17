<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravolt\Indonesia\Models\Village;

class Employee extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'position',
        'bank',
        'bank_no',
        'zip_code',
        'identity_number',
        'dob',
        'village_id',
        'address',
    ];

    const DEFAULT_IDENTITY = 'storage/default_image.png';

    protected $dates = ['dob'];

    public function village(): BelongsTo
    {
        return $this->belongsTo(Village::class, 'village_id');
    }
}
