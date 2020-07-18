<?php

namespace App\Http\Controllers;

use App\Category;
use App\GroupCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::with('groupCategory')->latest()->get();
        $arrGroupCategory = GroupCategory::latest()->get();
        return view('backend.category.index', compact('categories', 'arrGroupCategory'));
    }


    public function create()
    {
        $arrGroupCategory = GroupCategory::get();
        return view('backend.category.create', compact('arrGroupCategory'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'                 => 'required|unique:categories|max:255',
            'image'                => 'required|image|mimes:jpg,png,jpeg',
            'group_categories_id'  => 'required|max:2'
        ]);

        // if(isset($request->status)){
        //     $status = true;
        // }else{
        //     $status = false;
        // }
        if($request->status == 'on'){
            $status = true;
        }else{
            $status = false;
        }

        if ($request->hasFile('image')) {
            $imageName = 'category-'.time().uniqid().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $imageName);
        }

        Category::create([
            'name'   => $request->name,
            'slug'   => str_slug($request->name),
            'image'  => $imageName,
            'status' => $status,
            'group_categories_id' => $request->group_categories_id,
        ]);

        return redirect()->route('admin.category.index')->with(['message' => 'Category created successfully!']);
    }


    public function show(Category $category)
    {
        //
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
            'image'  => 'image|mimes:jpg,png,jpeg'
        ]);

        if(isset($request->status)){
            $status = true;
        }else{
            $status = false;
        }

        $category = Category::findOrFail($category->id);

        if ($request->hasFile('image')) {

            if(file_exists(public_path('images/') . $category->image)){
                unlink(public_path('images/') . $category->image);
            }

            $imageName = 'category-'.time().uniqid().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $imageName);

        }else{
            $imageName = $category->image;
        }

        $category->update([
            'name'   => $request->name,
            'slug'   => str_slug($request->name),
            'image'  => $imageName,
            'status' => $status
        ]);

        return redirect()->route('admin.category.index')->with(['message' => 'Category updated successfully!']);
    }


    public function destroy(Category $category)
    {
        $category = Category::findOrFail($category->id);

        if(file_exists(public_path('images/') . $category->image)){
            unlink(public_path('images/') . $category->image);
        }

        $category->delete();

        return back()->with(['message' => 'Category deleted successfully!']);
    }
}
