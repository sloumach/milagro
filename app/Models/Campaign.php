<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $fillable = [
        'title', 'channel', 'message', 'filters',
        'status', 'scheduled_at', 'sent_count', 'open_count'
    ];

    protected $casts = [
        'filters' => 'array',
        'scheduled_at' => 'datetime',
    ];

    public function logs()
    {
        return $this->hasMany(CampaignLog::class);
    }
}
