<?php

namespace App\Http\Controllers;

use App\Costumer;
use App\User;
use Illuminate\Http\Request;

class CostumerController extends Controller
{
    public function getUserCostumerList($userId)
    {
        $costumers = User::findOrFail($userId)->costumers()->paginate(3);

        return response()->json($costumers);
    }

    public function getUserCostumer($userId, $costumerId)
    {
        $costumer = Costumer::findOrFail($costumerId);

        return response()->json($costumer);
    }

    public function saveUserCostumer(Request $request, $userId)
    {
        $costumer = Costumer::create($request->all());

        $costumer->users()->sync($userId);

        return response()->json($costumer);
    }

    public function deleteUserCostumer($userId, $costumerId)
    {
        // TODO : validasi bahwa ini punya user
        $costumer = Costumer::findOrFail($costumerId);
        $costumer->delete();
        $costumer->users()->detach();

        return response()->json($costumer);
    }

    public function updateUserCostumer(Request $request, $userId, $costumerId)
    {
        $costumer = Costumer::findOrFail($costumerId);
        $costumer->name = $request->name;
        $costumer->phone = $request->phone;
        $costumer->email = $request->email;
        $costumer->city = $request->city;
        $costumer->address = $request->address;

        $costumer->update();

        $costumer->users()->sync($userId);       

        return response()->json($costumer);
    }
}
