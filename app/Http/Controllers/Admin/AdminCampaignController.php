<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Services\CampaignService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminCampaignController extends Controller
{
    public function __construct(protected CampaignService $campaignService) {}

    public function index()
    {
        return response()->json([
            'campaigns' => Campaign::latest()->get()
        ]);
    }

    public function store(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'title'          => 'required|string|max:255',
            'channel'        => 'required|in:email,whatsapp',
            'message'        => 'required|string',
            'filters'        => 'nullable|array',
            'scheduled_at'   => 'nullable|date|after:now',
        ])->validate();

        $campaign = Campaign::create([
            'title'        => $validated['title'],
            'channel'      => $validated['channel'],
            'message'      => $validated['message'],
            'filters'      => $validated['filters'] ?? null,
            'scheduled_at' => $validated['scheduled_at'] ?? null,
            'status'       => $validated['scheduled_at'] ? 'scheduled' : 'draft',
        ]);

        return response()->json(['message' => 'Campaign created.', 'data' => $campaign]);
    }

    public function sendNow(int $id)
    {
        $campaign = Campaign::findOrFail($id);

        if ($campaign->status === 'sent') {
            return response()->json(['message' => 'Campaign already sent.'], 422);
        }

        $this->campaignService->sendCampaign($campaign);

        return response()->json(['message' => 'Campaign sent successfully.']);
    }
}
