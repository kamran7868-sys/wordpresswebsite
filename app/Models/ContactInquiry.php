<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactInquiry extends Model
{
    use HasFactory;

    protected $table = 'contact_inquiries';

    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'subject',
        'message',
        'admin_reply',
        'replied_at',
        'status',
        'ip_address',
    ];

    protected $casts = [
        'replied_at' => 'datetime',
    ];
}
