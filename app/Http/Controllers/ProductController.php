<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getUserProductList($userId)
    {
        // $products = User::findOrFail($userId)->products()->select('user_id')->paginate(3);
        $products = User::findOrFail($userId)->products()->paginate(3);

        return response()->json($products);
    }

    public function getUserProduct($userId, $productId)
    {
        $product = Product::findOrFail($productId);

        return response()->json($product);
    }

    public function saveUserProduct(Request $request, $userId)
    {
        $product = Product::create($request->all());

        $product->users()->sync($userId);

        return response()->json($product);
    }

    public function deleteUserProduct($userId, $productId)
    {
        // TODO : validasi bahwa ini punya user
        $product = Product::findOrFail($productId);
        $product->delete();
        $product->users()->detach();

        return response()->json($product);
    }

    public function updateUserProduct(Request $request, $userId, $productId)
    {
        $product = Product::findOrFail($productId);
        $product->name = $request->name;
        $product->purchase_price = $request->purchase_price;
        $product->sell_price = $request->sell_price;
        $product->info = $request->info;

        $product->update();

        $product->users()->sync($userId);       

        return response()->json($product);
    }
}
