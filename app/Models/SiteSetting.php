<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_name',
        'logo',
        'email',
        'phone',
        'address',
        'facebook_link',
        'instagram_link',
        'whatsapp_number',
        'about_us_ar',
        'about_us_en',
        'privacy_policy_ar',
        'privacy_policy_en',
    ];
}
