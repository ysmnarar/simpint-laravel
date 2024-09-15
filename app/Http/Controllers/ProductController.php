<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function product()
    {

        $products = Product::all();

        return view('Admin.Product.product', compact('products'));
    }

    public function formProduct()
    {

        $category = Category::all();

        return view('Admin.Product.addProduct', compact('category'));
    }

    public function addProduct(Request $request)
    {
        $imagePath = $request->file('img')->store('img-product', 'public');

        $products = Product::create([
            'writer_name' => $request->writer_name,
            'title' => $request->title,
            'desc' => $request->desc,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'slug' => Str::slug($request->title),
            'img' => $imagePath,
        ]);

        return redirect()->route('admin.index.product', compact('products'))
            ->with('Create', "Successfully Added Data $request->title !");
    }

    public function descProduct($products)
    {

        $products = Product::findOrFail($products->id);

        return view("Admin.Product.descProduct", compact("products"));
    }

    public function editProduct($id)
    {

        $category = Category::all();
        $products = Product::findOrFail($id);

        return view('Admin.Product.editProduct', compact('category', 'products'));
    }

    public function updateProduct(Request $request, $id)
    {

        $products = Product::findOrFail($id);
        if ($request->hasFile('img')) {
            // Upload gambar baru
            $newImagePath = $request->file('img')->store('img-product', 'public');

            // Hapus gambar lama jika ada
            if ($products->img) {
                Storage::disk('public')->delete($products->img);
            }

            // Update dengan gambar baru
            $products->img = $newImagePath;
        }

        // Update data lainnya
        $products->category_id = $request->category_id;
        $products->writer_name = $request->writer_name;
        $products->title = $request->title;
        $products->price = $request->price;
        $products->desc = $request->desc;

        // Menyimpan data perubahan
        $products->save();
        return redirect()->route('admin.index.product')
            ->with('Update', "Data $request->title Success Update");
    }

    public function deleteProduct(Request $request)
    {

        $products = Product::findOrFail($request->id);

        Storage::delete($products->img);
        $products->title = $request->title;
        $products->delete();

        return redirect()->back()
            ->with('Delete', "Data $request->title Successfully Delete");
    }
    
    // Filter data berdasarkan category
    public function Romance()
    {

        $category = Category::all();
        $products = Product::where('category_id', 'Romance')->get();

        return view('Admin.Product.product', compact('products'));
    }
    public function Horror()
    {

        $category = Category::all();
        $products = Product::where('category_id', 'Horror')->get();

        return view('Admin.Product.product', compact('products'));
    }
    public function Mystery()
    {

        $category = Category::all();
        $products = Product::where('category_id', 'Mystery')->get();

        return view('Admin.Product.product', compact('products'));
    }
    public function Fantasy()
    {

        $category = Category::all();
        $products = Product::where('category_id', 'Fantasy')->get();

        return view('Admin.Product.product', compact('products'));
    }
    public function TeenFiction()
    {

        $category = Category::all();
        $products = Product::where('category_id', 'Teen Fiction')->get();

        return view('Admin.Product.product', compact('products'));
    }
    public function Adventure()
    {

        $category = Category::all();
        $products = Product::where('category_id', 'Adventure')->get();

        return view('Admin.Product.product', compact('products'));
    }

    public function searchProduct(Request $request)
    {

        if ($request->has('search')) {
            $products = Product::where('title', 'LIKE', '%' . $request->search . '%')->get();
        } else {
            $products = Product::all();
        }

        return view('Admin.Product.product', compact('products'));
    }
}
