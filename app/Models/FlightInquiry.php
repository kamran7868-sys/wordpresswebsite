<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlightInquiry extends Model
{
    use HasFactory;

    protected $table = 'flight_inquiries';

    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'trip_type',
        'traveller_type',
        'cabin_class',
        'preferred_airline',
        'dep_city',
        'dest_city',
        'dep_date',
        'return_date',
        'count_adults',
        'count_children',
        'count_infants',
        'flex_dates',
        'multicity_legs',
        'special_requests',
        'status',
        'ip_address',
    ];

    protected $casts = [
        'dep_date' => 'date',
        'return_date' => 'date',
        'flex_dates' => 'boolean',
        'multicity_legs' => 'array',
        'count_adults' => 'integer',
        'count_children' => 'integer',
        'count_infants' => 'integer',
    ];
}
