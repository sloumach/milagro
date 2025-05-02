<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'type',
        'discount_value',
        'usage_limit',
        'used_count',
        'valid_from',
        'valid_to',
        'status',
    ];
}
