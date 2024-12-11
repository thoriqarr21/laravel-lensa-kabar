<?php

namespace App\Http\Controllers;

use App\Category;
use App\News;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::latest()->get();

        return view('backend.category.index', compact('categories'));
    }


    public function create()
    {
        return view('backend.category.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required|unique:categories|max:255',
        ]);

        if(isset($request->status)){
            $status = true;
        }else{
            $status = false;
        }

        Category::create([
            'name'   => $request->name,
            'slug'   => str_slug($request->name),

            'status' => $status
        ]);

        return redirect()->route('admin.category.index')->with(['message' => 'Category created successfully!']);
    }

 
    public function edit(Category $category)
    {
        $category = Category::findOrFail($category->id);

        return view('backend.category.edit', compact('category'));
    }


    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name'   => 'required|max:255',

        ]);

        if(isset($request->status)){
            $status = true;
        }else{
            $status = false;
        }

        $category = Category::findOrFail($category->id);



        $category->update([
            'name'   => $request->name,
            'slug'   => str_slug($request->name),

            'status' => $status
        ]);

        return redirect()->route('admin.category.index')->with(['message' => 'Category updated successfully!']);
    }


    public function destroy(Category $category)
    {
        $category = Category::findOrFail($category->id);



        $category->delete();

        return back()->with(['message' => 'Category deleted successfully!']);
    }

    public function show($id)
{
    $category = Category::findOrFail($id);
    $news = News::where('category_id', $id)->where('status', 1)->get();
    return view('frontend.category.show', compact('category', 'news'));
}
}
