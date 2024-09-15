<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function likes()
    {
        $customerId = Auth::id();
        $likedProducts = Product::whereHas('likes', function($query) use ($customerId) {
            $query->where('customer_id', $customerId);
        })->get();

        return view('Front.Page.likes', compact('likedProducts'));
    }

    public function productLikes()
    {
        $customerId = Auth::id();
        $likedProducts = Product::whereHas('likes', function($query) use ($customerId) {
            $query->where('customer_id', $customerId);
        })->get();

        return view('Front.Page.likes', compact('likedProducts'));
    }

    public function removeLike($id)
{
    $user = Auth::user();
    $user->likes()->where('product_id', $id)->delete();

    return response()->json(['success' => true]);
}
}
