<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function category(){

        $categories = Category::all();
        
        return view('Admin.Category.category', compact("categories"));
    }

    public function formCategory(){

        return view('Admin.Category.addCategory');
    }

    public function addCategory(Request $request){

        Category::create([
            'category' => $request->category,
            'slug' => Str::slug($request->category),
        ]);

        return redirect()->route('index.category')->with('Create', "Genre $request->category Successfully Added");
    }

    public function editCategory($id){

        $categories = Category::findOrfail($id);

        return view('Admin.Category.editCategory', compact('categories'));
    }

    public function updateCategory(Request $request, Category $category){

        $categories = Category::findOrFail($request->id);
        $categories->category = $request->category;
        $categories->slug = Str::slug($request->category);
        $categories->update();

        return redirect()->route('index.category')
        ->with('Update', "Genre $request->category Successfully Update");
    }

    public function deleteCategory(Request $request){

        $categories = Category::findOrFail($request->id);
        $categories->category = $request->category;
        $categories->delete();
        return redirect()->back()->with('Delete', "Genre $request->category Successfully Delete");
    }

    public function searchCategory(Request $request){

        if($request->has('search')){
            $categories = Category::where('category','LIKE', '%' .$request->search.'%')->get();
        }else{
            $categories = Category::all();
        }

        return view('Admin.Category.category', compact('categories'));
    }
}
