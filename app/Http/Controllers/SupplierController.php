<?php

namespace App\Http\Controllers;

use App\Supplier;
use App\User;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function getUserSupplierList($userId)
    {
        $suppliers = User::findOrFail($userId)->suppliers()->paginate(3);

        return response()->json($suppliers);
    }

    public function getUserSupplier($userId, $supplierId)
    {
        $supplier = Supplier::findOrFail($supplierId);

        return response()->json($supplier);
    }

    public function saveUserSupplier(Request $request, $userId)
    {
        $supplier = Supplier::create($request->all());

        $supplier->users()->sync($userId);

        return response()->json($supplier);
    }

    public function deleteUserSupplier($userId, $supplierId)
    {
        // TODO : validasi bahwa ini punya user
        $supplier = Supplier::findOrFail($supplierId);
        $supplier->delete();
        $supplier->users()->detach();

        return response()->json($supplier);
    }

    public function updateUserSupplier(Request $request, $userId, $supplierId)
    {
        $supplier = Supplier::findOrFail($supplierId);
        $supplier->name = $request->name;
        $supplier->phone = $request->phone;
        $supplier->email = $request->email;
        $supplier->city = $request->city;
        $supplier->address = $request->address;

        $supplier->update();

        $supplier->users()->sync($userId);       

        return response()->json($supplier);
    }
}
