<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{

    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'room_number',
        'number_of_guests',
        'check_in',
        'check_out',
        'id_document_type',
        'id_document_number',
        'special_requests',
    ];

    protected $casts = [
        'check_in' => 'datetime',
        'check_out' => 'datetime',
    ];
}
