<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Guest;
use App\Models\User;

class ServiceRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'guest_id',
        'service_type',
        'description',
        'priority',
        'status',
        'handled_by',
        'completed_at',
    ];

    protected $casts = [
        'completed_at' => 'datetime',
    ];

    // Relationships
    public function guest()
    {
        return $this->belongsTo(Guest::class);
    }


    public function handledBy()
    {
        return $this->belongsTo(User::class, 'handled_by');
    }
}
