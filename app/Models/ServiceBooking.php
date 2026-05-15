<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceBooking extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'plan_type',
        'patient_name',
        'patient_age',
        'relationship',
        'address',
        'city',
        'state',
        'zip_code',
        'preferred_date',
        'notes',
        'status',
        'amount',
        'payment_status',
        'stripe_session_id',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
