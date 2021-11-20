<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{
    public function index()
    {if (!Gate::allows('admin')) {
        abort(403);
    }
        $categories = Category::paginate(6);
        return view('admin.manage_categories.list_category', compact('categories'));
    }

    public function create()
    {if (!Gate::allows('admin')) {
        abort(403);
    }
        return view('admin.manage_categories.create');
    }

    public function store(CategoryRequest $request)
    {if (!Gate::allows('admin')) {
        abort(403);
    }
        $category = new Category();
        $category->name = $request->input('name');
        $category->save();
        return redirect()->route('categories.index');
    }

    public function edit($id)
    {if (!Gate::allows('admin')) {
        abort(403);
    }
        $category = Category::findOrFail($id);
        return view('admin.manage_categories.edit', compact('category'));
    }

    public function update(CategoryRequest $request, $id)
    {if (!Gate::allows('admin')) {
        abort(403);
    }
        $category = Category::findOrFail($id);
        $category->name = $request->input('name');
        $category->save();
        return redirect()->route('categories.index');
    }

    public function destroy($id)
    {if (!Gate::allows('admin')) {
        abort(403);
    }
        $category = Category::findOrFail($id);
        $category->products()->delete();
        $category->delete();
        return redirect()->route('categories.index');
    }
}
