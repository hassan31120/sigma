<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        Carbon::setLocale('ar');
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $cats = Category::all();
        return view('admin.products.add', compact('cats'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'desc' => 'required',
            'ads' => 'required',
            'image' => 'required',
            'price' => 'required|numeric',
            'cat_id' => 'required'
        ]);
        $data = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = 'storage/images/products/images/' . date('Y') . '/' . date('m') . '/';
            $name = $path . time() . '-' . $file->getClientOriginalName();
            $file->move($path, $name);
            $data['image'] = $name;
        }
        Product::create($data);
        return redirect(route('admin.products'))->with('success', 'تم إضاقة المنتج بنجاح');
    }

    public function edit($id)
    {
        $cats = Category::all();
        $product = Product::find($id);
        return view('admin.products.edit', compact('product', 'cats'));
    }

    public function update(Request $request, $id)
    {
        $article = Product::find($id);
        $request->validate([
            'title' => 'required',
            'desc' => 'required',
        ]);
        $data = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = 'storage/images/products/imgages/' . date('Y') . '/' . date('m') . '/';
            $name = $path . time() . '-' . $file->getClientOriginalName();
            $file->move($path, $name);
            $data['image'] = $name;
        }
        if ($request->hasFile('banner')) {
            $file = $request->file('banner');
            $path = 'storage/images/products/banners/' . date('Y') . '/' . date('m') . '/';
            $name = $path . time() . '-' . $file->getClientOriginalName();
            $file->move($path, $name);
            $data['banner'] = $name;
        }
        $article->update($data);
        return redirect(route('admin.products'))->with('success', 'تم تعديل المنتج بنجاح');
    }

    public function destroy($id)
    {
        $article = Product::find($id);
        $article->delete();
        return redirect(route('admin.products'))->with('success', 'تم حذف المنتج بنجاح');
    }
}
