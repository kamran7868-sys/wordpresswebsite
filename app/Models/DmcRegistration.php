<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DmcRegistration extends Model
{
    use HasFactory;

    protected $table = 'dmc_registrations';

    protected $fillable = [
        'company_name',
        'contact_person',
        'email',
        'phone',
        'country',
        'years_in_operation',
        'website',
        'services',
        'details',
        'status',
        'ip_address',
    ];

    protected $casts = [
        'services' => 'array',
        'years_in_operation' => 'integer',
    ];
}
