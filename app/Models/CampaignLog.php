<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CampaignLog extends Model
{
    protected $fillable = [
        'campaign_id', 'user_id', 'status', 'sent_at', 'opened'
    ];

    protected $casts = [
        'sent_at' => 'datetime',
        'opened' => 'boolean',
    ];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
