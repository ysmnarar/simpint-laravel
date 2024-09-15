<?php

namespace App\Http\Controllers\Api;

use App\Helpers\MessageHelper;
use App\Models\Product;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class ProductApiController extends Controller
{
    public function index()
    {

        $products = Product::get()->map(function ($products) {
            return $this->format($products);
        });
        return $this->respons($products);
    }

    public function format($category)
    {
        return [
            'id' => $category->id,
            'writer_name' => $category->writer_name,
            'title' => $category->title,
            'desc' => $category->desc,
            'slug' => Str::slug($category->title),
            'tanggal_tambah' => Carbon::parse($category->created_at)->translatedFormat('d F Y'),
        ];
    }

    public function respons($category)
    {
        return response()->json([
            'status' => true,
            'data' => $category,
        ], 200);
    }
}
