<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Campaign;
use App\Services\CampaignService;
use Illuminate\Support\Carbon;

class SendScheduledCampaigns extends Command
{
    protected $signature = 'campaigns:send-scheduled';

    protected $description = 'Envoyer automatiquement les campagnes planifiées à l\'heure prévue';

    public function handle(CampaignService $campaignService): int
    {
        $now = Carbon::now();

        $campaigns = Campaign::where('status', 'scheduled')
            ->whereNotNull('scheduled_at')
            ->where('scheduled_at', '<=', $now)
            ->get();

        foreach ($campaigns as $campaign) {
            $this->info("Envoi de la campagne ID #{$campaign->id} - {$campaign->title}");
            $campaignService->sendCampaign($campaign);
        }

        return Command::SUCCESS;
    }
}
