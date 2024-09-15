<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Like;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class FrontController extends Controller
{
    public function home()
    {
        $categories = Category::all();
        $products = Product::all()->map(function ($product) {
            $customerId = auth()->check() ? auth()->user()->id : null;
            $product->isLiked = $customerId ? $product->isLikedByUser($customerId) : false;
            return $product;
        });

        return view('Front.baseFront', compact('products', 'categories'));
    }

    public function detail($id)
    {
        $products = Product::findOrFail($id);
        $liked = Like::where('product_id', $id)
            ->where('customer_id', auth()->id())
            ->exists();
        return view('Front.Page.detailProduct', compact('products', 'liked'));
    }

    public function sidebarLogin()
    {
        return view('Front.sidebarLogin');
    }

    public function toggleLike($id)
    {
        $customerId = auth()->user()->id;
        $like = Like::where('customer_id', $customerId)->where('product_id', $id)->first();

        if ($like) {
            $like->delete();
            return response()->json(['message' => 'Produk dihapus dari suka!']);
        } else {
            Like::create(['customer_id' => $customerId, 'product_id' => $id]);
            return response()->json(['message' => 'Produk ditambahkan ke suka!']);
        }
    }

    public function showProfile()
    {
        $user = Auth::user();
        return view('Front.profile', compact('user'));
    }

    public function editProfile()
    {
        $user = Auth::user();
        return view('Front.edit_profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
            $avatarPath = public_path('/avatars');
            $avatar->move($avatarPath, $avatarName);

            if ($user->avatar) {
                $existingAvatarPath = public_path('/avatars/' . $user->avatar);
                if (File::exists($existingAvatarPath)) {
                    File::delete($existingAvatarPath);
                }
            }

            $user->avatar = $avatarName;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        Log::info('User updated:', ['user' => $user]);

        return redirect()->route('show.profile')->with('success', 'Profile updated successfully.');
    }
    public function Romance()
    {
        $products = Product::where('category_id', 'Romance')->get();

        return view('Front.Page.categories', compact('products'));
    }
    public function Horror()
    {
        $products = Product::where('category_id', 'Horror')->get();

        return view('Front.Page.categories', compact('products'));
    }
    public function Mystery()
    {
        $products = Product::where('category_id', 'Mystery')->get();

        return view('Front.Page.categories', compact('products'));
    }
    public function Fantasy()
    {
        $products = Product::where('category_id', 'Fantasy')->get();

        return view('Front.Page.categories', compact('products'));
    }
    public function TeenFiction()
    {
        $products = Product::where('category_id', 'Teen Fiction')->get();

        return view('Front.Page.categories', compact('products'));
    }
    public function Adventure()
    {
        $products = Product::where('category_id', 'Adventure')->get();

        return view('Front.Page.categories', compact('products'));
    }

    public function categories()
    {
        $categories = Category::all();
        $products = Product::all();

        return view('Front.Page.categories', compact('categories', 'products'));
    }
    public function breadcrumbs()
    {

        return view('Front.Page.breadcrumbs');
    }

    public function searchBook(Request $request)
    {
        if ($request->q != "") {
            //get products by keywords
            $products = Product::where('name', 'like', '%' . $request->q
                . '%')->get();
        } else {
            $products = [];
        }
        //return response
        return response()->json([
            'products' => $products,
        ]);
    }

}
