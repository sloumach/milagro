<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ClientService;
use Illuminate\Http\JsonResponse;

class AdminClientController extends Controller
{
    public function __construct(protected ClientService $clientService)
    {
    }

    public function index(): JsonResponse
    {
        $clients = $this->clientService->getAllClients();

        return response()->json([
            'data' => $clients,
        ]);
    }

    public function show(int $id): JsonResponse
    {
        $client = $this->clientService->getClientDetails($id);

        return response()->json([
            'data' => $client,
        ]);
    }
}
