<?php
namespace App\Services;

use App\Models\User;

class ClientService
{
    public function getAllClients()
    {
        return User::where('role', 'client')->withCount('orders')->latest()->get();
    }

    public function getClientDetails(int $id)
    {
        return User::where('role', 'client')->with('orders.orderItems')->findOrFail($id);
    }
}
