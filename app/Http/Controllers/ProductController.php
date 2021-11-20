<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function index()
    {
        if (!Gate::allows('admin')) {
            abort(403);
        }
        $products = Product::paginate(6);
        return view('admin.layouts.products', compact('products'));
    }

    public function product_in_index()
    {
        $products = Product::paginate(15);
        return view('users.layouts.index', compact('products'));
    }

    public function create()
    {
        if (!Gate::allows('admin')) {
            abort(403);
        }
        $categories = Category::all();
        return view('admin.manage_products.create', compact('categories'));
    }

    public function store(ProductRequest $request)
    {
        if (!Gate::allows('admin')) {
            abort(403);
        }
        $product = new Product();
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->quantity = $request->input('quantity');
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $product->image = $path;
        }
        $product->category_id = $request->input('category_id');
        $product->save();
        return redirect()->route('products.index');
    }

    public function edit($id)
    {
        if (!Gate::allows('admin')) {
            abort(403);
        }
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.manage_products.edit_product', compact('product', 'categories'));
    }

    public function update(ProductRequest $request, $id)
    {
        if (!Gate::allows('admin')) {
            abort(403);
        }
        $product = Product::findOrFail($id);
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->category_id = $request->input('category_id');
        $product->description = $request->input('description');
        $product->quantity = $request->input('quantity');
        if ($request->hasFile('image')) {
            Storage::delete('public/storage/' . $product->image);
            $path = $request->file('image')->store('images', 'public');
            $product->image = $path;
        }
        $product->save();
        return redirect()->route('products.index');
    }

    public function destroy($id)
    {
        if (!Gate::allows('admin')) {
            abort(403);
        }
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index');
    }

    public function search(Request $request)
    {
        try {
            $key = $request->input('key');
            $products = Product::where("name", 'like', '%' . $key . '%')->get();
            return view('users.layouts.index', compact('products'));
        } catch (ModelNotFoundException $exception) {
            return back()->withErrors($exception->getMessage())->withInput();
        }
    }

    public function product_detail($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('users.layouts.product_detail', compact('product', 'categories'));
    }

}
