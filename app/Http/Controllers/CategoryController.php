<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Plat;
use Illuminate\Http\Request;
use function compact;
use function public_path;
use function redirect;
use function session;
use function time;
use function url;
use function view;

class CategoryController extends Controller
{
    public function create()
    {
        return view('category-create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'image' => 'required|image',
        ]);
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $category = new Category();
        $category->title = $validatedData['title'];
        $category->image= $imageName;
        $category->save();
        session()->flash('message', 'Category created successfully.');
        return redirect()->route("dashboard");
    }

    public static function findAllCatgories()
    {
        $categories = Category::all();
        return $categories;
    }

    public function edit(Category $category)
    {
        return view('category-edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'title' => 'required|max:255',
            'image' => 'required|image',
        ]);
        $category->title = $request->input('title');

        // image
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        // set image
        $category->image = $imageName;
        $category->save();
        session()->flash('message', 'Category updated successfully.');
        return url()->previous();
    }
    public function destroy(Category $category)
    {
        $category->delete();
        session()->flash('message', 'Category deleted successfully.');
        return url()->previous();
    }
}
