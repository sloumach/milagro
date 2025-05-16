<?php

namespace App\Services;

use App\Models\Campaign;
use App\Models\CampaignLog;
use App\Models\User;
use Carbon\Carbon;
use Twilio\Rest\Client;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class CampaignService
{
    public function sendCampaign(Campaign $campaign): void
    {
        $users = $this->filterUsers($campaign);

        foreach ($users as $user) {
            $status = 'sent';
            try {
                if ($campaign->channel === 'email') {
                    Mail::raw($campaign->message, function ($msg) use ($user, $campaign) {
                        $msg->to($user->email)->subject($campaign->title);
                    });
                } elseif ($campaign->channel === 'whatsapp') {
                    $twilio = new Client(config('services.twilio.sid'), config('services.twilio.token'));

                    $twilio->messages->create(
                        'whatsapp:' . $user->phone, // Numéro du client
                        [
                            'from' => config('services.twilio.whatsapp_from'),
                            'body' => $campaign->message
                        ]
                    );
                }
            } catch (\Exception $e) {
                Log::error("Campaign send error to user {$user->id}: {$e->getMessage()}");
                $status = 'failed';
            }

            CampaignLog::create([
                'campaign_id' => $campaign->id,
                'user_id'     => $user->id,
                'status'      => $status,
                'sent_at'     => Carbon::now(),
            ]);
        }

        $campaign->update([
            'status' => 'sent',
            'sent_count' => $users->count(),
        ]);
    }

    private function filterUsers(Campaign $campaign)
    {
        $query = User::query();
        $filters = $campaign->filters ?? [];

        if (isset($filters['order_status'])) {
            $query->whereHas('orders', function ($q) use ($filters) {
                $q->whereIn('status', $filters['order_status']);
            });
        }

        if (isset($filters['registered_after'])) {
            $query->whereDate('created_at', '>=', $filters['registered_after']);
        }

        if (isset($filters['min_purchase'])) {
            $query->whereHas('orders', function ($q) use ($filters) {
                $q->selectRaw('user_id, SUM(final_amount) as total')->groupBy('user_id')
                  ->having('total', '>=', $filters['min_purchase']);
            });
        }

        return $query->get();
    }
}
