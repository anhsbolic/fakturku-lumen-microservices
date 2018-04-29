<?php

namespace App\Http\Controllers;

use App\Cost;
use App\User;
use Illuminate\Http\Request;

class CostController extends Controller
{
    public function getUserCostList($userId)
    {
        $costs = User::findOrFail($userId)->costs()->paginate(3);

        return response()->json($costs);
    }

    public function getUserCost($userId, $costId)
    {
        $cost = Cost::findOrFail($costId);

        return response()->json($cost);
    }

    public function saveUserCost(Request $request, $userId)
    {
        $cost = Cost::create($request->all());

        $cost->users()->sync($userId);

        return response()->json($cost);
    }

    public function deleteUserCost($userId, $costId)
    {
        // TODO : validasi bahwa ini punya user
        $cost = Cost::findOrFail($costId);
        $cost->delete();
        $cost->users()->detach();

        return response()->json($cost);
    }

    public function updateUserCost(Request $request, $userId, $costId)
    {
        $cost = Cost::findOrFail($costId);
        $cost->name = $request->name;
        $cost->unit_cost = $request->unit_cost;
        $cost->info = $request->info;

        $cost->update();

        $cost->users()->sync($userId);       

        return response()->json($cost);
    }
}
