<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    use HasFactory;
    protected $fillable = [
        'id', 'order_id', 'payment_proof', 'status', 'verified_by',
    ];

    // status = pending | activated
}
