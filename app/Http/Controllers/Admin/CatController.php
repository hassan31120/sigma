<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Category;

class CatController extends Controller
{
    public function index()
    {
        Carbon::setLocale('ar');
        $cats = Category::all();
        return view('admin.cats.index', compact('cats'));
    }

    public function create()
    {
        return view('admin.cats.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $data = $request->all();
        Category::create($data);
        return redirect(route('admin.cats'))->with('success', 'تم إضاقة القسم بنجاح');
    }

    public function edit($id)
    {
        $cat = Category::find($id);
        return view('admin.cats.edit', compact('cat'));
    }

    public function update(Request $request, $id)
    {
        $cat = Category::find($id);
        $request->validate([
            'name' => 'required'
        ]);
        $data = $request->all();
        $cat->update($data);
        return redirect(route('admin.cats'))->with('success', 'تم تعديل القسم بنجاح');
    }

    public function destroy($id)
    {
        $cat = Category::find($id);
        $cat->delete();
        return redirect(route('admin.cats'))->with('success', 'تم حذف القسم بنجاح');
    }
}
