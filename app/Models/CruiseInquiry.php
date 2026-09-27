<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CruiseInquiry extends Model
{
    use HasFactory;

    protected $table = 'cruise_inquiries';

    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'departure_port',
        'cruise_region',
        'cruise_line',
        'voyage_name',
        'cruise_length',
        'sail_month',
        'cabin_type',
        'flexible_dates',
        'traveller_type',
        'count_adults',
        'count_children',
        'count_infants',
        'special_occasion',
        'preferred_airline',
        'special_requests',
        'admin_reply',
        'replied_at',
        'status',
        'ip_address',
    ];

    protected $casts = [
        'flexible_dates' => 'boolean',
        'count_adults' => 'integer',
        'count_children' => 'integer',
        'count_infants' => 'integer',
        'replied_at' => 'datetime',
    ];
}
